<!DOCTYPE html>
<html lang="fr">

<?php require "../views/head.php" ?>

<body>
    <?php require "../views/header.php" ?>
    <?php require "../views/body.php" ?>
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