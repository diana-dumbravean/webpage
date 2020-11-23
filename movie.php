<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
 <?php include "includes/functions.php";?> 
 
<!--  <h1>Top filme</h1> -->
  
  
<!--  First Website Post-->
  
<?php

if(isset($_GET['p_id'])) {
   $movie_id = $_GET['p_id'];
}

    $query = "SELECT * FROM movies WHERE movie_id = $movie_id ";
    $get_movie = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($get_movie)) {
        
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_genre = $row['movie_genre'];
        $movie_description = $row['movie_description'];
        $movie_rating = $row['movie_rating'];
        $movie_age = $row['movie_age'];
        $movie_youtube = $row['movie_youtube'];
        $movie_tags = $row['movie_tags'];
    
?>
  

   <div class="container">
       
     <article class="post">
        
        <h2>
            <a href="movie.php"><?php echo $movie_title?></a>
        </h2>
         

     <div class="main-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $movie_youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         
       
       
    <div class="properties">
      
        <div class="imdbRating">
              <span class="imdbRatingPlugin" data-user="ur123131426" data-title="<?php echo $movie_rating ?>" data-style="p3"><a href="https://www.imdb.com/title/tt0451279/?ref_=plg_rt_1"><img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_37x18.png" alt=" Wonder Woman
                (2017) on IMDb" />
            </a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})(document,"script","imdb-rating-api");</script>   
      </div> 
     
   
       
       
        <p>Genre : <?php echo $movie_genre?></p>

        <p>Description : <?php echo $movie_description?></p>

        

        <p>Age : <?php echo $movie_age?></p>

        <p>Tags : <?php echo $movie_tags?></p>
        </div> 
        </div>

    </article>
    
   <?php } ?> 


 

<?php include "includes/footer.php";?>