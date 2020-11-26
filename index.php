<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
 
<h1>All Entertainment</h1>
  
<!--  First Website Post-->
  
<?php
/*
* Get all movies from the database
*/

    $query = "SELECT * FROM movies";
    $get_all_movies = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($get_all_movies)) {
        $movie_id = $row['movie_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_genre = $row['movie_genre'];      
?> 
   <div class="container">   
     <article class="main">  
         <div class="main-image">
              <a href="movie.php?p_id=<?php echo $movie_id?>">
                  <img src="images/<?php echo $movie_image?>" alt="">
              </a> 
         </div>
      <h2>
          <a href="movie.php?p_id=<?php echo $movie_id?>"><?php echo $movie_title?></a>
      </h2>
          <p><?php echo $movie_genre?></p> 
    </article>
   <?php } ?> 
<?php
/*
* Get all series from the database
*/
    $query = "SELECT * FROM series ";
    $get_all_series = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($get_all_series)) {
        $serie_id = $row['serie_id'];
        $serie_title = $row['serie_title'];
        $serie_image = $row['serie_image'];
        $serie_genre = $row['serie_genre'];
        $serie_seasons = $row['serie_seasons'];
        $serie_episodes = $row['serie_episodes']; 
?>
   <div class="container">  
     <article class="main">   
     <div class="main-image">
      <a href="serie.php?p_id=<?php echo $serie_id?>">
      <img src="images/<?php echo $serie_image?>" alt="">
      </a> 
     </div> 
      <h2>
          <a href="serie.php?p_id=<?php echo $serie_id?>"><?php echo $serie_title?></a>
      </h2>
      <p><?php echo $serie_genre?></p> 
      <p>Episodes <?php echo $serie_episodes?></p>
      <p>Seasons <?php echo $serie_seasons?></p> 
    </article>
   <?php } ?> 
  <?php include "includes/footer.php";?>  