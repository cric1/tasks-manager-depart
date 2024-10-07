 <?php require '../src/functions.php';
    session_start();    
     $erreurs = [];
     if (!isset($_SESSION['username'])) {
        redirect('index.php');
     }
     
     $user = $_SESSION['username'];
     $formSubmitted = false; 
     
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
         $formSubmitted = true;
         $taskNum = $_POST['task_id'];

         if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = htmlspecialchars($_GET['title']);
        } else {
            $erreurs['title'] = "Veuillez saisir un titre.";
        }
        
        if (isset($_GET['category'])) {
            $category = htmlspecialchars($_GET['category']);
        } else {
            $erreurs['category'] = "Veuillez sélectionner une catégorie.";
        }

        if (isset($_GET['date']) && !empty($_GET['date'])) {
            $date = htmlspecialchars($_GET['date']);
        } else {
            $erreurs['date'] = "Veuillez saisir une date.";
        }

        if (isset($_GET['status'])) {
            $status = htmlspecialchars($_GET['status']);
        } else {
            $erreurs['status'] = "Veuillez sélectionner un statut.";
        }

        if (isset($_GET['description']) && !empty($_GET['description'])) {
            $description = htmlspecialchars($_GET['description']);
        } else {
            $erreurs['description'] = "Veuillez saisir une description.";
        }

        $user = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        if (!$user) {
            redirect('index.php');
        }
        
        if (empty($erreurs)) {
            $updatedTask = [
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'status' => $status,
                'description' => $description
            ];
            
            updateTask('data/' . $user . '-tasks.json', $taskNum, $updatedTask);

            $title = $category = $date = $status = $description = '';
        }
    }
    
     $categories = readFromFile('data/categories.json');
     $status = readFromFile('data/status.json');
    ?>
     
<!DOCTYPE html>
<html lang="fr">
<?php require "../views/head.php"; 
     $task = readFromFile('data/' . $user . '-tasks.json')[$taskNum]; ?>

 <body>
     <?php require "../views/header.php"; ?>

     <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Modifier une tâche</h2>
                        <form method="POST">
                            <input type="hidden" name="task_id" value="<?= $taskNum ?>">
                            <input type="hidden" name="confirm_delete" value="1">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" 
                                    value="<?= htmlspecialchars($task['title']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <input type="text" class="form-control" id="category" 
                                    value="<?= $task['category'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" 
                                    value="<?= $task['date']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <input type="text" class="form-control" id="status" 
                                    value="<?=$task['status']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" 
                                    value="<?= htmlspecialchars($task['description']) ?>">
                            </div>

                            <button type="submit" class="btn btn-warning">Modifier</button>
                            <a class="btn btn-primary" href="task-index.php">
                                <span class="bi-arrow-left"></span> Annuler
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "../views/footer.php"; ?>
</body>
</html>
    