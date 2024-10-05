<!DOCTYPE html>
<html lang="fr">
    
<?php require "../views/head.php"?>  

<body>
    <?php require "../views/header.php"?>  

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
        
        <?php require "../views/footer.php"?>
    </div>
</body>
</html>
