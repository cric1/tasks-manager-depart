<!DOCTYPE html>
<html lang="fr">

<?php require "../views/head.php"?>

<body>
    <?php require "../views/header.php"?>    

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

<?php 

require '../src/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        $users = json_decode(file_get_contents('data/users.json'), true);
        $userExists = false;
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $userExists = true;

                break;
            }
        }

        if ($userExists) {
            redirect('task-index.php');
            exit();
        } else {

            echo "<div class='alert alert-danger'>Nom d'utilisateur incorrect</div>";
        }
    }
}
?>