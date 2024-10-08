<!DOCTYPE html>
<html lang="fr">

<?php require "../views/head.php"; ?>

<body>
    <?php require "../views/header.php"; ?>
    <?php require '../src/functions.php';
 
 if (isset($_POST['user'])) {
    $user = htmlspecialchars($_POST['user']); 
} elseif (isset($_GET['user'])) {
    $user = htmlspecialchars($_GET['user']);
}
else {
    redirect('index.php');
    exit();
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
            addTask($user, $newTask);
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
