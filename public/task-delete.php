<?php
require '../src/functions.php';
session_start();

if (!isset($_SESSION['username'])) {
    redirect('index.php');
}

$user = $_SESSION['username'];
$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['task_id'];

    if (isset($_POST['confirm_delete'])) {
        if (deleteTask($user, $taskId)) {
            redirect('task-index.php');
        }
    } else {
        $tasks = readFromFile('data/' . $user . '-tasks.json');
        $task = $tasks[$taskId] ;
        
            $title = $task['title'];
            $category = $task['category'];
            $date = $task['date'];
            $status = $task['status'];
            $description = $task['description'];
    }
} else {
    redirect('task-index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php require "../views/head.php"; ?>

<body>
    <?php require "../views/header.php"; ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Supprimer une tâche</h2>
                        <form method="POST">
                            <input type="hidden" name="task_id" value="<?= $taskId ?>">
                            <input type="hidden" name="confirm_delete" value="1">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input disabled type="text" class="form-control" id="title" 
                                    value="<?= htmlspecialchars($title) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <input disabled type="text" class="form-control" id="category" 
                                    value="<?= $category ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input disabled type="date" class="form-control" id="date" 
                                    value="<?= $date ?>">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <input disabled type="text" class="form-control" id="status" 
                                    value="<?= $status ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input disabled type="text" class="form-control" id="description" 
                                    value="<?= htmlspecialchars($description) ?>">
                            </div>

                            <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
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
