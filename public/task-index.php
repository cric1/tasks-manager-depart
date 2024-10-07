<!DOCTYPE html>
<html lang="fr">
<?php require '../src/functions.php'?>
<?php require "../views/head.php"?>  
<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
    redirect('index.php');
    }
    $user = $_SESSION['username'];?>

<body>
    <?php require "../views/header.php"?>  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">        
                <!-- TODO : Filtre -->
                <form action="task-index.php" method="POST" class="mb-4"> 
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Catégorie -->
                            <select class="form-select" name="category"> 
                                <option value="" selected hidden>Toutes les catégories</option>
                                <?php $categories = readFromFile("data/categories.json");?>
                                <?php foreach($categories as $category) : ?>
                                    <option value="<?= $category['name'] ?>"> <?= $category['name'] ?></option>
                                <?php endforeach ?> 
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Statut -->
                            <select class="form-select" name="status">
                                <option value="" selected hidden>Tous les status</option>
                                <?php $statusFile = readFromFile("data/status.json");?>
                                    
                                <?php foreach($statusFile as $status) : ?>
                                    <option value="<?= $status['name'] ?>"> <?= $status['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <!-- Recherche par texte -->
                            <input class="form-control" type="text" id="searchText" name="searchText" placeholder="Recherche par texte">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">Filtrer</button>
                        </div>
                    </div>
                </form>

                <?php 
                    $tasks = readFromFile("data/" . $user . "-tasks.json");
                 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                           
                            if (!empty($_POST['category'])) {
                                $categoryFilter = $_POST['category'];
                                $tasks = array_filter($tasks, function($task) use ($categoryFilter): bool {
                                return $task['category'] === $categoryFilter;
                                });
                                
                            }
                                            
                            if (!empty($_POST['status'])) {
                                $statusFilter = $_POST['status'];
                                $tasks = array_filter($tasks, function($task) use ($statusFilter): bool {
                                return $task['status'] === $statusFilter;
                                });
                            }
                                                
                            if (!empty($_POST['searchText'])) {
                                $searchText = htmlspecialchars($_POST['searchText']);
                                $tasks = array_filter($tasks, function($task) use ($searchText) {
                                    return $task['title'] === $searchText ||
                                           $task['description'] === $searchText;
                                });
                            }
                    }
                        
                    
                ?>

                <!-- TODO : Ajouter une tâche -->
                <form action="task-add.php" method="POST" class="mb-2">
                    <button class="btn btn-success" type="submit">Ajouter une tâche</button>
                </form>
                
                <div class="row g-3">
                    <?php foreach($tasks as $taskNum => $task) : ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card card-custom">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($task["title"]) ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?= $task["category"] ?> - 
                                    <?= $task["date"] ?> 
                                    <?php 
                                        if($task["status"] === 'Terminé'){
                                            $badgeStatus = '<span class="badge bg-success ms-3">' . $task["status"] . '</span>';
                                        }
                                        if($task["status"] === 'En Cours'){
                                            $badgeStatus = '<span class="badge bg-secondary ms-3">' . $task["status"] . '</span>';
                                        }
                                        if($task["status"] === 'À Débuter'){
                                            $badgeStatus = '<span class="badge bg-primary ms-3">' . $task["status"] . '</span>';
                                        }
                                    ?>
                                    <?= $badgeStatus ?>
                                </h6>
                                <p class="card-text"><?= htmlspecialchars($task["description"]) ?></p>
                                <div class="container">
                                    <form action="task-edit.php" method="POST" class="d-inline-block">
                                        <input type="hidden" name="task_id" value="<?=$taskNum?>">
                                        <button class="btn btn-warning" type="submit">Modifier</button>
                                    </form>

                                    <form action="task-delete.php" method="POST" class="d-inline-block">
                                        <input type="hidden" name="task_id" value="<?= $taskNum?>">
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        
        <?php require "../views/footer.php"?>
    </div>
</body>
</html>
