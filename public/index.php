<!DOCTYPE html>
<html lang="fr">

<?php
require "../views/head.php";
require '../src/functions.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $users = readFromFile('data/users.json');
        $userExists = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
           $_SESSION['username'] = $username;
           redirect('task-index.php'); 
           exit();
        } else {
            echo "<div class='alert alert-danger'>Nom d'utilisateur incorrect</div>";
        }
    }
}
?>

<body>
<header class="bg-primary text-white py-3">
    <div class="container header-content">
        <div></div> <!-- Empty div to help center the title -->
        <h1 class="header-title mb-0">
            <i class="fa-solid fa-list-check"></i> Gestionnaire de Tâches
        </h1>
        
    </div>
</header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" value="">
                                <span class="help-inline"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "../views/footer.php"?>
</body>
</html>


