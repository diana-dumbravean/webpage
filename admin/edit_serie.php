<?php include "admin_header.php"; ?>
  
             <?php
            
            if(isset($_GET['edit'])){
                
                
                $serie_id = $_GET['edit'];
            
            $query = "SELECT * FROM series WHERE serie_id = $serie_id " ;
            $get_series_by_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($get_series_by_id)) {
            $serie_id = $row['serie_id'];
            $serie_title = $row['serie_title'];  
            $serie_image = $row['serie_image'];
            $serie_genre = $row['serie_genre'];
            $serie_age = $row['serie_age'];
            $serie_rating = $row['serie_rating'];
            $serie_youtube = $row['serie_youtube'];
            $serie_description = $row['serie_description'];
            $serie_tags = $row['serie_tags'];
            $serie_seasons = $row['serie_seasons'];
            $serie_episodes = $row['serie_episodes'];
            
            }
                
        if(isset($_POST['update_serie'])) {
//           
            $the_serie_title = $_POST['serie_title'];  
            
            $the_serie_image = $_FILES['serie_image']['name'];
            $the_serie_image_temp = $_FILES['serie_image']['tmp_name'];
            
            $the_serie_genre = $_POST['serie_genre'];
            $the_serie_age = $_POST['serie_age'];
            $the_serie_rating = $_POST['serie_rating'];
            $the_serie_youtube = $_POST['serie_youtube'];
            $the_serie_description = $_POST['serie_description'];
            $the_serie_tags = $_POST['serie_tags'];
            $the_serie_seasons = $_POST['serie_seasons'];
            $the_serie_episodes = $_POST['serie_episodes'];
            
            move_uploaded_file($the_serie_image_temp, "../images/$the_serie_image " );
            
            if(empty($the_serie_image)) {
                $query = "SELECT * FROM series WHERE serie_id = $serie_id ";
                $select_image = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_array($select_image)) {
                    $the_serie_image = $row['serie_image'];
                }
                
            }
            
            $query = "UPDATE series SET ";
            $query .="serie_title = '{$the_serie_title}', ";
            $query .="serie_image = '{$the_serie_image}', ";
            $query .="serie_genre = '{$the_serie_genre}', ";
            $query .="serie_age = '{$the_serie_age}', ";
            $query .="serie_rating = '{$the_serie_rating}', ";
            $query .="serie_youtube = '{$the_serie_youtube}', ";
            $query .="serie_description = '{$the_serie_description}', ";
            $query .="serie_tags = '{$the_serie_tags}', ";
            $query .="serie_seasons = '{$the_serie_seasons}', ";
            $query .="serie_episodes = '{$the_serie_episodes}' ";
            $query .="WHERE serie_id = {$serie_id} ";
            
            $update_serie = mysqli_query($connection, $query);
            
            confirmQuery($update_serie);
            
            header("Location: view_all_media.php");
    
}

        
        
            ?> 
    
       
   
       <form class="form_series" action="" method="post" enctype="multipart/form-data">
          <h2>Edit Series</h2>
          <div >
              <label for="serie_title">Title</label>
              <input type="text" class="form-control" name="serie_title" value="<?php echo $serie_title; ?>">
          </div>
          
           <div >
              <label for="serie_image">Image</label>
              <input class ="image" type="file"  name="serie_image" value="<?php echo $serie_image; ?>">
          </div>
          
          <div >
              <label for="serie_seasons">Seasons</label>
              <input type="text" class="form-control" name="serie_seasons" value="<?php echo $serie_seasons; ?>">
          </div>
          
          <div >
              <label for="serie_episodes">Episodes</label>
              <input type="text" class="form-control" name="serie_episodes" value="<?php echo $serie_episodes; ?>">
          </div>
          
           <div >
            <select name="serie_genre" id="">
<?php

            $query = "SELECT * FROM genres " ;
            $select_genres = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_genres)) {
            $genre_id = $row['genre_id'];
            $genre_title = $row['genre_title']; 
                
                
                echo "<option value='{$genre_title}'>$genre_title</option>";
                
                
                
            }

?>            
          
            </select>
          </div>
          
           <div >
              <label for="serie_age">Age</label>
              <input type="text" class="form-control" name="serie_age" value="<?php echo $serie_age; ?>">
          </div>
          
           <div >
              <label for="serie_rating">Rating</label>
              <input type="text" class="form-control" name="serie_rating" value="<?php echo $serie_rating; ?>">
          </div>
          
           <div >
              <label for="serie_youtube">Youtube</label>
              <input type="text" class="form-control" name="serie_youtube" value="<?php echo $serie_youtube; ?>">
          </div>
          
          <div>
              <label for="serie_tags">Tags</label>
              <input type="text" class="form-control" name="serie_tags" value="<?php echo $serie_tags; ?>">
          </div>
          
           <div>
              <label for="serie_description">Description</label>
              <textarea class="form-group" name="serie_description" id="" cols="30" rows="10"><?php echo $serie_description; ?></textarea>
          </div>
          
           
          
          <div class="media">
              <button type="submit"  name="update_serie" value="update_serie">Update serie</button>
          </div>
          
           
       </form>
        <?php        }?>
       
    
<?php include "admin_footer.php"; ?>