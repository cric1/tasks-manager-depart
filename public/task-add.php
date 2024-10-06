<!DOCTYPE html>
<html lang="fr">

<?php require "../views/head.php" ?>

<body>
    <?php require "../views/header.php" ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Ajouter une tâche</h2>
                        <form method="GET">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" value="">
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select id='category' name='category' class='form-select'>
                                    <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                    <option value="">awddaw</option>
                                </select>
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="">
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                    <option value="">awddaw</option>
                                </select>
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                <span class="help-inline"></span>
                            </div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <a class="btn btn-primary" href=""><span class="bi-arrow-left"></span> Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require '../src/functions.php';
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['title']) && isset($_GET['category']) && isset($_GET['date']) && isset($_GET['status']) && isset($_GET['description'])) {  
        
        if ($users = $_SESSION['username'] === null || $users = $_SESSION['username'] === '') {
            redirect('index.php');
        }

        $title = htmlspecialchars($_GET['title']);
        $category = htmlspecialchars($_GET['category']);
        $date = htmlspecialchars($_GET['date']);
        $status = htmlspecialchars($_GET['status']);
        $description = htmlspecialchars($_GET['description']);
        $tasks = json_decode(file_get_contents('data/' . $users . "-tasks.json"), true);
        $taskExists = false;

       
            $tasks[] = [
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'status' => $status,
                'description' => $description
            ];
            file_put_contents('data/' . $users . "-tasks.json", json_encode($tasks));
            echo "<div class='alert alert-success'>Tâche ajoutée avec succès</div>";
            redirect('task-index.php');
    } else {
        echo "<div class='alert alert-danger'>Veuillez remplir tous les champs</div>";
    }
    ?>
    <?php require "../views/footer.php" ?>
</body>

</html>