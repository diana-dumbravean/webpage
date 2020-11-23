<?php include "admin_header.php"; ?>
 
 
 <?php

insert_movies();


?>
  
      <h1>Add Media</h1>
      
      
      
       <form class="form" action="add_media.php" method="post" enctype="multipart/form-data">
          <h2>Add Movie</h2>
          <div >
              <label for="movie_title">Title</label>
              <input type="text" class="form-control" name="movie_title">
          </div>
          
           <div >
              <label for="movie_image">Image</label>
              <input class ="image" type="file"  name="image">
          </div>
          
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
          
           <div >
              <label for="movie_age">Age</label>
              <input type="text" class="form-control" name="movie_age">
          </div>
          
           <div >
              <label for="movie_rating">Rating</label>
              <input type="text" class="form-control" name="movie_rating">
          </div>
          
           <div >
              <label for="movie_youtube">Youtube</label>
              <input type="text" class="form-control" name="movie_youtube">
          </div>
          
          <div>
              <label for="movie_tags">Tags</label>
              <input type="text" class="form-control" name="movie_tags">
          </div>
          
           <div>
              <label for="movie_description">Description</label>
              <textarea class="form-group" name="movie_description" id="" cols="30" rows="10"></textarea>
          </div>
          
           
          
          <div class="media">
              <button type="submit" name="create_movie" value="Submit">Add movie</button>
          </div>
          
           
       </form>
       
       
  <?php

insert_series();

?>      
       
   
       <form class="form_series" action="" method="post" enctype="multipart/form-data">
          <h2>Add Series</h2>
          <div >
              <label for="serie_title">Title</label>
              <input type="text" class="form-control" name="serie_title">
          </div>
          
           <div >
              <label for="serie_image">Image</label>
              <input class ="image" type="file"  name="serie_image">
          </div>
          
          <div >
              <label for="serie_seasons">Seasons</label>
              <input type="text" class="form-control" name="serie_seasons">
          </div>
          
          <div >
              <label for="serie_episodes">Episodes</label>
              <input type="text" class="form-control" name="serie_episodes">
          </div>
          
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
          
           <div >
              <label for="serie_age">Age</label>
              <input type="text" class="form-control" name="serie_age">
          </div>
          
           <div >
              <label for="serie_rating">Rating</label>
              <input type="text" class="form-control" name="serie_rating">
          </div>
          
           <div >
              <label for="serie_youtube">Youtube</label>
              <input type="text" class="form-control" name="serie_youtube">
          </div>
          
          <div>
              <label for="serie_tags">Tags</label>
              <input type="text" class="form-control" name="serie_tags">
          </div>
          
           <div>
              <label for="serie_description">Description</label>
              <textarea class="form-group" name="serie_description" id="" cols="30" rows="10"></textarea>
          </div>
          
           
          
          <div class="media">
              <button type="submit"  name="create_serie" value="Submit">Add serie</button>
          </div>
          
           
       </form>
      
<?php include "admin_footer.php"; ?>