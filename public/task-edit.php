 <!DOCTYPE html>
 <html lang="fr">
 
 <?php require "../views/head.php"; ?>
 
 <body>
     <?php require "../views/header.php"; ?>
     <?php require '../src/functions.php';
     
     session_start();    
     
 
     
     $categories = json_decode(file_get_contents('data/categories.json'), true);
     $status = json_decode(file_get_contents('data/status.json'), true);
     ?>
 
     <?php $titre = "Modifier une tâche"; ?>
     <?php $nomBtn = "Modifier"; ?>
     <?php require "../views/body.php"; ?>
     <?php require "../views/footer.php"; ?>
 </body>
 
 </html>
    