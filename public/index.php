<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/44720d3ccc.js" crossorigin="anonymous"></script> 
</head>
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
    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; 2024 Gestionnaire de Tâches</p>
    </footer>
</body>
</html>
