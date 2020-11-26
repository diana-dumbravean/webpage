<?php include "admin_header.php"; ?>
<h1>Welcome to Admin</h1>

<div class="container">
    <div class="table_movies">
        <h2>Movies</h2>
<table class="table_all_movies">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Rating</th>
            <th>Age</th>
            <th>Youtube</th>
            <th>Tags</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>      
<?php get_movies(); ?>        
    </tbody>
</table>
</div>       
  <div class="table_series">
   <h2>Series</h2> 
<table class="table_all_series">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Rating</th>
            <th>Age</th>
            <th>Youtube</th>
            <th>Tags</th>
            <th>Seasons</th>
            <th>Episodes</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>  
<?php get_series(); ?>       
    </tbody>
</table>
</div>        
</div>

<?php 
/*
* Delete movie from the database
*/ 
if(isset($_GET['delete'])) { 
    $the_movie_id = $_GET['delete'];
    $query = "DELETE FROM movies WHERE movie_id = {$the_movie_id} ";
    $delete_movie = mysqli_query($connection, $query);
    header("Location: view_all_media.php");
}
/*
* Delete serie from the database
*/ 
if(isset($_GET['delete'])) {
    $the_serie_id = $_GET['delete'];
    $query = "DELETE FROM series WHERE serie_id = {$the_serie_id} ";
    $delete_serie = mysqli_query($connection, $query);
    header("Location: view_all_media.php");
}
?>

<?php include "admin_footer.php"; ?>