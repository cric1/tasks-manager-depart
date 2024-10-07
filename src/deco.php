<?php
require 'functions.php';
session_start();
unset($_SESSION['username']);
redirect('../public/index.php');
exit();
?>