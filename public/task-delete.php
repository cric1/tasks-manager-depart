<?php
require '../src/functions.php';
session_start();

if (!isset($_SESSION['username'])) {
    redirect('index.php');
}
$user = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskNum = $_POST['task_id'];

    if (isset($_POST['confirm_delete'])) {
        deleteTask($user, $taskNum);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require "../views/head.php"; 
 $task = readFromFile('data/' . $user . '-tasks.json')[$taskNum];
?>

<body>
    <?php require "../views/header.php"; ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Supprimer une tâche</h2>
                        <form method="POST">
                            <input type="hidden" name="task_id" value="<?= $taskNum ?>">
                            <input type="hidden" name="confirm_delete" value="1">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input disabled type="text" class="form-control" id="title" 
                                    value="<?= htmlspecialchars($task['title']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <input disabled type="text" class="form-control" id="category" 
                                    value="<?= $task['category'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input disabled type="date" class="form-control" id="date" 
                                    value="<?= $task['date']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <input disabled type="text" class="form-control" id="status" 
                                    value="<?=$task['status']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input disabled type="text" class="form-control" id="description" 
                                    value="<?= htmlspecialchars($task['description']) ?>">
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
