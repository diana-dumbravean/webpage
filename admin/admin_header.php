<?php ob_start(); ?>
<?php include "../includes/db.php" ?>
<?php include_once "admin_functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/scripts.js"></script>
</head>
<body>

  <nav class="admin_menu">
   
    <a href="view_all_media.php">View all media</a>
    <a href="add_genre.php">Add genre</a> 
    <a href="add_media.php">Add Media</a>
    <a class = "front" href="../index.php">Front</a>   
      
  </nav>