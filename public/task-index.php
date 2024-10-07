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
                <form action="task-index.php" method="GET" class="mb-4"> 
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
                    session_start();
                    $user = $_SESSION['username'];
                    $tasks = readFromFile("data/" . $user . "-tasks.json");
                 
                        
                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                           
                            if (isset($_GET['category']) && !empty($_GET['category'])) {
                                $categoryFilter = htmlspecialchars($_GET['category']);
                        
                                if ($categoryFilter != 'Toutes les catégories') {
                                    $tasks = array_filter($tasks, function($task) use ($categoryFilter): bool {
                                        return isset($task['category']) && $task['category'] === $categoryFilter;
                                    });
                                }
                            }
                        
                           
                            if (isset($_GET['status']) && !empty($_GET['status'])) {
                                $statusFilter = htmlspecialchars($_GET['status']);
                        
                                if ($statusFilter != 'Tous les status') {
                                    $tasks = array_filter($tasks, function($task) use ($statusFilter): bool {
                                        return isset($task['status']) && $task['status'] === $statusFilter;
                                    });
                                }
                            }
                        
                           
                            if (isset($_GET['searchText']) && !empty($_GET['searchText'])) {
                                $searchText = htmlspecialchars($_GET['searchText']);
                                $tasks = array_filter($tasks, function($task) use ($searchText) {
                                    return (isset($task['title']) && $task['title'] === $searchText) ||
                                           (isset($task['description']) && $task['description'] === $searchText);
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
                                    <?= $task["status"] ?>
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
