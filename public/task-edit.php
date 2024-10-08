 <?php require '../src/functions.php';


    if (isset($_POST['user'])) {
        $user = htmlspecialchars($_POST['user']); 
    } elseif (isset($_GET['user'])) {
        $user = htmlspecialchars($_GET['user']);
    }
    else {
        redirect('index.php');
    } 

    $taskNum = $_POST['task_id'];
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_edit'])) {
        
         if (isset($_POST['title']) && !empty($_POST['title'])) {
            $title = $_POST['title'];
        } else {
            $erreurs['title'] = "Veuillez saisir un titre.";
        }
        
        if (isset($_POST['category'])) {
            $category = $_POST['category'];
        } else {
            $erreurs['category'] = "Veuillez sélectionner une catégorie.";
        }

        if (isset($_POST['date']) && !empty($_POST['date'])) {
            $date = $_POST['date'];
        } else {
            $erreurs['date'] = "Veuillez saisir une date.";
        }

        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        } else {
            $erreurs['status'] = "Veuillez sélectionner un statut.";
        }

        if (isset($_POST['description']) && !empty($_POST['description'])) {
            $description = $_POST['description'];
        } else {
            $erreurs['description'] = "Veuillez saisir une description.";
        }

        if (empty($erreurs)) {
            $updatedTask = [
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'status' => $status,
                'description' => $description
            ];
            updateTask('data/' . $user . '-tasks.json', $taskNum, $updatedTask);
            redirect('task-index.php?user=' . $user);
        }
    }
     $categories = readFromFile('data/categories.json');
     $status = readFromFile('data/status.json');
     $task = readFromFile('data/' . $user . '-tasks.json')[$taskNum];
    ?>
     
<!DOCTYPE html>
<html lang="fr">
<?php require "../views/head.php"?>
     
 <body>
     <?php require "../views/header.php" ?>
     <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2> Modifier une Tâche </h2>
                    <form method="POST">
                        <!-- Champ Titre -->
                        <input type="hidden" name="task_id" value="<?= $taskNum ?>">
                        <input type="hidden" name="confirm_edit" value="1">
                        <input type="hidden" name="user" value="<?= $user ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $task['title'] ?>">
                                <?php if (isset($erreurs['title'])) : ?>
                                    <div class="text-danger"><?= $erreurs['title'] ?></div>
                                <?php endif; ?>
                        </div>

                        <!-- Champ Catégorie -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select id="category" name="category" class="form-select">
                                <option hidden value="<?= $task['category'] ?>"><?= $task['category'] ?></option>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= $cat['name'] ?>"><?= $cat['name'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                                <?php if (isset($erreurs['category'])): ?>
                                    <div class="text-danger"><?= $erreurs['category'] ?></div>
                                <?php endif; ?>
                        </div>

                        <!-- Champ Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $task['date'] ?>">
                                <?php if (isset($erreurs['date'])): ?>
                                    <div class="text-danger"><?= $erreurs['date'] ?></div>
                                <?php endif; ?>
                        </div>

                        <!-- Champ Statut -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select id="status" name="status" class="form-select">
                                <option hidden value="<?= $task['status'] ?>"><?= $task['status'] ?></option> 
                                    <?php foreach ($status as $stat): ?>
                                        <option value="<?= $stat['name'] ?>"><?= $stat['name']?></option>
                                    <?php endforeach; ?>
                            </select>
                                <?php if (isset($erreurs['status'])): ?>
                                    <div class="text-danger"><?= $erreurs['status'] ?></div>
                                <?php endif; ?>
                        </div>

                        <!-- Champ Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?= $task['description'] ?></textarea>
                                <?php if (isset($erreurs['description'])): ?>
                                    <div class="text-danger"><?= $erreurs['description'] ?></div>
                                <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-warning"> Modifier </button>
                        <a class="btn btn-primary" href="task-index.php?user=<?= urlencode($user); ?>"><span class="bi-arrow-left"></span> Annuler</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php require "../views/footer.php"; ?>
</body>
</html>
    