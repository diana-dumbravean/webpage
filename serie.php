<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<!--  First Website Post-->
  
<?php
/*
* Get the serie by id
*/

if(isset($_GET['p_id'])) {
   $serie_id = $_GET['p_id'];
}
    $query = "SELECT * FROM series WHERE serie_id = $serie_id ";
    $get_serie = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($get_serie)) {   
        $serie_title = $row['serie_title'];
        $serie_image = $row['serie_image'];
        $serie_genre = $row['serie_genre'];
        $serie_description = $row['serie_description'];
        $serie_rating = $row['serie_rating'];
        $serie_age = $row['serie_age'];
        $serie_youtube = $row['serie_youtube'];
        $serie_tags = $row['serie_tags'];
        $serie_seasons = $row['serie_seasons'];
        $serie_episodes = $row['serie_episodes'];       
?>  
   <div class="container">       
     <article class="post">      
        <h2>
            <a href="serie.php"><?php echo $serie_title?></a>
        </h2>   
       <div class="main-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $serie_youtube ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
     </div>     
    <div class="properties">    
        <div class="imdbRating">
        <span class="imdbRatingPlugin" data-user="ur123131426" data-title="<?php echo $serie_rating ?>" data-style="p3"><a href="https://www.imdb.com/title/tt0451279/?ref_=plg_rt_1"><img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_37x18.png" alt=" Wonder Woman
        (2017) on IMDb" />
        </a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})(document,"script","imdb-rating-api");</script>   
        </div> 
            <p>Genre : <?php echo $serie_genre?></p>     
            <p>Seasons : <?php echo $serie_seasons  ?> &nbsp;  Episodes : <?php echo $serie_episodes?></p>      
            <p>Description : <?php echo $serie_description?></p>
            <p>Age : <?php echo $serie_age?></p>
            <p>Tags : <?php echo $serie_tags?></p>
        </div>
    </article> 
   <?php } ?> 
<?php include "includes/footer.php";?>