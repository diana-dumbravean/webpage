<?php include "admin_header.php"; ?>
 
 


  
             <?php
            
            if(isset($_GET['edit'])){
                
                
                $movie_id = $_GET['edit'];
            
            $query = "SELECT * FROM movies WHERE movie_id = $movie_id " ;
            $get_movies_by_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($get_movies_by_id)) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];  
            $movie_image = $row['movie_image'];
            $movie_genre = $row['movie_genre'];
            $movie_age = $row['movie_age'];
            $movie_rating = $row['movie_rating'];
            $movie_youtube = $row['movie_youtube'];
            $movie_description = $row['movie_description'];
            $movie_tags = $row['movie_tags'];
            
            }
                
        if(isset($_POST['update_movie'])) {
//            $movie_id = $_POST['movie_id'];
            $the_movie_title = $_POST['movie_title'];  
            
            $the_movie_image = $_FILES['movie_image']['name'];
            $the_movie_image_temp = $_FILES['movie_image']['tmp_name'];
            
            $the_movie_genre = $_POST['movie_genre'];
            $the_movie_age = $_POST['movie_age'];
            $the_movie_rating = $_POST['movie_rating'];
            $the_movie_youtube = $_POST['movie_youtube'];
            $the_movie_description = $_POST['movie_description'];
            $the_movie_tags = $_POST['movie_tags'];
            
            move_uploaded_file($the_movie_image_temp, "../images/$the_movie_image " );
            
            if(empty($the_movie_image)) {
                $query = "SELECT * FROM movies WHERE movie_id = $movie_id ";
                $select_image = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_array($select_image)) {
                    $the_movie_image = $row['movie_image'];
                }
                
            }
            
            $query = "UPDATE movies SET ";
            $query .="movie_title = '{$the_movie_title}', ";
            $query .="movie_image = '{$the_movie_image}', ";
            $query .="movie_genre = '{$the_movie_genre}', ";
            $query .="movie_age = '{$the_movie_age}', ";
            $query .="movie_rating = '{$the_movie_rating}', ";
            $query .="movie_youtube = '{$the_movie_youtube}', ";
            $query .="movie_description = '{$the_movie_description}', ";
            $query .="movie_tags = '{$the_movie_tags}' ";
            $query .="WHERE movie_id = {$movie_id} ";
            
            $update_movie = mysqli_query($connection, $query);
            
            confirmQuery($update_movie);
            
            header("Location: view_all_media.php");
    
}

        
        
            ?>    
     
     
      <h1>Edit Movie</h1>
      
      
      
       <form class="form" action="" method="post" enctype="multipart/form-data">
 
          <div >
              <label for="movie_title">Title</label>
              <input type="text" class="form-control" name="movie_title" value="<?php echo $movie_title; ?>">
          </div>
          
           <div >
             <img width='100' src="../images/<?php echo $movie_image; ?>" alt="">
             <input class ="image" type="file"  name="movie_image">
          </div>
          
           <div >
            <select name="movie_genre" id="">
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
              <label for="movie_age">Age</label>
              <input type="text" class="form-control" name="movie_age" value="<?php echo $movie_age; ?>">
          </div>
          
           <div >
              <label for="movie_rating">Rating</label>
              <input type="text" class="form-control" name="movie_rating" value="<?php echo $movie_rating; ?>">
          </div>
          
           <div >
              <label for="movie_youtube">Youtube</label>
              <input type="text" class="form-control" name="movie_youtube" value="<?php echo $movie_youtube; ?>">
          </div>
          
          <div>
              <label for="movie_tags">Tags</label>
              <input type="text" class="form-control" name="movie_tags" value="<?php echo $movie_tags; ?>">
          </div>
          
           <div>
              <label for="movie_description">Description</label>
              <textarea  class="form-group" name="movie_description" id="" cols="30" rows="10"><?php echo $movie_description; ?>
                  
              </textarea>
          </div>
          
           
          
          <div class="media">
              <button type="submit" name="update_movie" value="update_movie">Update movie</button>
          </div>
          
           
       </form>
 <?php        }?>
     

      
       
<?php include "admin_footer.php"; ?>