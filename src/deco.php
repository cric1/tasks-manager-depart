<?php
session_start();
unset($_SESSION['username']); // Reset the username session variable
header('Location: ../public/index.php');
exit();
?>