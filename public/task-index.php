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
        <div class="row">
            <div class="col-md-12">        
                <!-- TODO : Filtre -->
                <form action="" method="POST" class="mb-4"> 
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Catégorie -->
                            <select class="form-select">
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Statut -->
                            <select class="form-select">
                            </select>
                        </div>

                        <div class="col-md-4">
                            <!-- Recherche par texte -->
                            
                        </div>

                        <div class="col-md-2">
                            
                        </div>
                    </div>
                </form>

                <!-- TODO : Ajouter une tâche -->
                <form action="" method="POST" class="mb-2">
                    
                </form>

                <!-- TODO : Liste des tâches -->
                <div class="row g-3">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card card-custom">
                            <div class="card-body">
                                <h5 class="card-title">Titre de la tâche</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Categorie - Date Statut</h6>
                                <p class="card-text">Description de la tâche</p>
                                <div class="container">
                                    <!-- TODO : Modifier une tâche -->
                                    <form action="" method="POST" class="d-inline-block">
                                    </form>
                                    <!-- TODO : Supprimer une tâche -->
                                    <form action="" method="POST" class="d-inline-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-light text-center py-3 mt-4">
            <p>&copy; 2024 Gestionnaire de Tâches</p>
        </footer>
    </div>
</body>
</html>
