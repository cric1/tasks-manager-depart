 <!DOCTYPE html>
 <html lang="fr">
 
 <?php require "../views/head.php"; ?>
 
 <body>
     <?php require "../views/header.php"; ?>
     <?php require '../src/functions.php';
     
     session_start();    
     $erreurs = [];
     if (!isset($_SESSION['username'])) {
        redirect('index.php');
    }
    $user = $_SESSION['username'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $taskNum = $_POST['task_id'];
        $title = 
        $category = 
        $date = 
        $status = 
        $description = 
    }
     $formSubmitted = false; 
     $title = 
     $category = 
     $date = 
     $status = 
     $description = 
     if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
         $formSubmitted = true;
 
         if (isset($_GET['title']) && !empty($_GET['title'])) {
             $title = htmlspecialchars($_GET['title']);
         } else {
             $erreurs['title'] = "Veuillez saisir un titre.";
         }
         
         if (isset($_GET['category'])) {
             $category = htmlspecialchars($_GET['category']);
         } else {
             $erreurs['category'] = "Veuillez sélectionner une catégorie.";
         }
 
         if (isset($_GET['date']) && !empty($_GET['date'])) {
             $date = htmlspecialchars($_GET['date']);
         } else {
             $erreurs['date'] = "Veuillez saisir une date.";
         }
 
         if (isset($_GET['status'])) {
             $status = htmlspecialchars($_GET['status']);
         } else {
             $erreurs['status'] = "Veuillez sélectionner un statut.";
         }
 
         if (isset($_GET['description']) && !empty($_GET['description'])) {
             $description = htmlspecialchars($_GET['description']);
         } else {
             $erreurs['description'] = "Veuillez saisir une description.";
         }
 
         $user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
 
         if (!$user) {
             redirect('index.php');
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
 
     
     $categories = json_decode(file_get_contents('data/categories.json'), true);
     $status = json_decode(file_get_contents('data/status.json'), true);
     ?>
 
     <?php $titre = "Modifier une tâche"; ?>
     <?php $nomBtn = "Modifier"; ?>
     <?php require "../views/body.php"; ?>
     <?php require "../views/footer.php"; ?>
 </body>
 
 </html>
    