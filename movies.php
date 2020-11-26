<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

  <h1>Top filme</h1> 
  
<!--  First Movies Post-->
  
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
 <?php include "includes/footer.php";?>  