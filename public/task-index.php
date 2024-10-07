<!DOCTYPE html>
<html lang="fr">
<?php require '../src/functions.php'?>
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

                                <!-- ****** -->

                                 <option value="" selected hidden>Toutes les catégories</option>
                               
                                 <?php $categories = readFromFile("data/categories.json");?>
                                 
                                 <?php foreach($categories as $category) : ?>
                                    <option value=<?= $category['name'] ?>> <?= $category['name'] ?></option>
                                 <?php endforeach ?> 

                                <!-- ****** -->

                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Statut -->
                            <select class="form-select">

                            <!-- ****** -->

                                 <option value="" selected hidden>Tous les status</opt>

                                 <?php $statusFile = readFromFile("data/status.json");?>
                                 
                                 <?php foreach($statusFile as $status) : ?>
                                    <option value=<?= $status['name'] ?>> <?= $status['name'] ?></option>
                                 <?php endforeach ?>
                                 
                            <!-- ****** -->

                            </select>
                        </div>

                        <div class="col-md-4">
                            <!-- Recherche par texte -->
                             
                            <!-- ****** -->
                            <input class="form-control" type="text" id="searchText" name="searchText" placeholder="Recherche par texte">
                            <!-- ****** -->

                        </div>

                        <div class="col-md-2">
                            
                            <!-- ****** Manque la fonction (filtrer selon les valeurs)-->
                            <button class="btn btn-primary" type="button">Filtrer</button>
                            <!-- ****** -->

                        </div>
                    </div>
                </form>

                <!-- TODO : Ajouter une tâche -->
                <form action="task-add.php" method="POST" class="mb-2">
                    <button class="btn btn-success" type="submit">Ajouter une tâche</button>
                </form>
                <!-- ****** -->

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
                                        
                                    <!-- ****** -->
                                        <button class="btn btn-warning" type="submit">Modifier</button>
                                         <?php  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                     redirect("task-edit.php");
                                                }
                                         ?> 
                                    <!-- ****** -->

                                    </form>
                                    <!-- TODO : Supprimer une tâche -->
                                    <form action="" method="POST" class="d-inline-block">
                                        
                                    <!-- ****** -->
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                        <?php  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    redirect("task-delete.php");
                                                }
                                            ?> 
                                    <!-- ****** -->

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
