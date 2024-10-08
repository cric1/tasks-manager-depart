<!DOCTYPE html>
<html lang="fr">

<?php require "../views/head.php"; ?>

<body>
    <?php require "../views/header.php"; ?>
    <?php require '../src/functions.php';
    
   //message au prof: j'ai utilise session_start() ici pour que la variable de session et donc username soit accessible dans tout les fichiers.
    //je pense pas quon a vu ca en classe mais je ne trouve pas une meilleure solution pour le moment
    //je trouve que c'est plus simple de faire cela que de passer la variable dans un get
    //voici les sources que jai utilise pour comprendre comment fonctionne les sessions
    //https://www.php.net/manual/en/function.session-start.php
    //https://www.w3schools.com/php/php_sessions.asp
     session_start();
        if (!isset($_SESSION['username'])) {
            redirect('index.php');
        }
        
    $erreurs = [];
    $title = $category = $date = $status = $description = '';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
        } else {
            $erreurs['title'] = "Veuillez saisir un titre.";
        }
        
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        } else {
            $erreurs['category'] = "Veuillez sélectionner une catégorie.";
        }

        if (isset($_GET['date']) && !empty($_GET['date'])) {
            $date = $_GET['date'];
        } else {
            $erreurs['date'] = "Veuillez saisir une date.";
        }

        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        } else {
            $erreurs['status'] = "Veuillez sélectionner un statut.";
        }

        if (isset($_GET['description']) && !empty($_GET['description'])) {
            $description = $_GET['description'];
        } else {
            $erreurs['description'] = "Veuillez saisir une description.";
        }
 
        if (empty($erreurs)) {
            $newTask = [
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'status' => $status,
                'description' => $description
            ];
            addTask($_SESSION['username'], $newTask);
            echo "<div class='alert alert-success'>Tâche ajoutée avec succès</div>";
            $title = $category = $date = $status = $description = '';
        }
    }
    
     $categories = readFromFile('data/categories.json');
     $status = readFromFile('data/status.json');
    ?>

    <?php $titre = "Ajouter une tâche" ?>
    <?php $nomBtn = "Ajouter" ?>
    <?php require "../views/body.php"; ?>
    <?php require "../views/footer.php"; ?>
</body>

</html>
