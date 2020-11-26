<?php
/*
* Confirm Query
*/
function confirmQuery($result) {  
    global $connection;  
        if(!$result) {    
        die("QUERY FAILED " . mysqli_error($connection));
    } 
}
/*
* Add movies to the database
*/
function insert_movies() {    
    global $connection;   
    if(isset($_POST['create_movie'])) {   
    $movie_title = $_POST['movie_title'];
    $movie_image = $_FILES['image']['name'];
    $movie_image_temp = $_FILES['image']['tmp_name'];   
    $movie_genre = $_POST['movie_genre'];
    $movie_age = $_POST['movie_age'];
    $movie_rating = $_POST['movie_rating'];
    $movie_youtube = $_POST['movie_youtube'];
    $movie_tags = $_POST['movie_tags'];
    $movie_description = $_POST['movie_description']; 
    move_uploaded_file($movie_image_temp, "../images/$movie_image" ); 
    $query = "INSERT INTO movies(movie_title, movie_image, movie_genre, movie_age, movie_rating, movie_youtube, movie_tags, movie_description) ";
    $query .= "VALUES('{$movie_title}','{$movie_image}','{$movie_genre}','{$movie_age}','{$movie_rating}','{$movie_youtube}','{$movie_tags}','{$movie_description}' )";
    $create_movie_query = mysqli_query($connection, $query);
    confirmQuery($create_movie_query);
}
}
/*
* Add series to the database
*/
function insert_series() { 
    global $connection;
    if(isset($_POST['create_serie'])) {
    $serie_title = $_POST['serie_title'];
    $serie_image = $_FILES['serie_image']['name'];
    $serie_image_temp = $_FILES['serie_image']['tmp_name'];
    $serie_genre = $_POST['serie_genre'];
    $serie_age = $_POST['serie_age'];
    $serie_rating = $_POST['serie_rating'];
    $serie_youtube = $_POST['serie_youtube'];
    $serie_tags = $_POST['serie_tags'];
    $serie_description = $_POST['serie_description'];
    $serie_seasons = $_POST['serie_seasons'];
    $serie_episodes = $_POST['serie_episodes'];
    move_uploaded_file($serie_image_temp, "../images/$serie_image" );
    $query = "INSERT INTO series(serie_title, serie_image, serie_genre, serie_age, serie_rating, serie_youtube, serie_tags, serie_description, serie_seasons, serie_episodes ) ";
    $query .= "VALUES('{$serie_title}','{$serie_image}','{$serie_genre}','{$serie_age}','{$serie_rating}','{$serie_youtube}','{$serie_tags}','{$serie_description}','{$serie_seasons}','{$serie_episodes}' ) ";
    $create_serie_query = mysqli_query($connection, $query);
    confirmQuery($create_serie_query);
}
}
/*
* Add genres to the database
*/
function insert_genres(){
    global $connection;
     if(isset($_POST['submit'])) {
     $genre_title = $_POST['genre_title'];    
        if($genre_title == "" || empty($genre_title)){
            echo "This field should not be empty";
        }else {  
            $query = "INSERT INTO genres(genre_title) ";
            $query .="VALUE ('{$genre_title}') "; 
            $create_genre_query = mysqli_query($connection, $query); 
            if(!$create_genre_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}
/*
* Get all genres from the database
*/
function findAllGenres() {
     global $connection;
    $query = "SELECT * FROM genres " ;
    $get_genre = mysqli_query($connection, $query);    
     while($row = mysqli_fetch_assoc($get_genre)) {
     $genre_id = $row['genre_id'];
     $genre_title = $row['genre_title'];
     echo "<tr>";
     echo "<td>{$genre_id}</td>";
     echo "<td>{$genre_title}</td>";
     echo "<td><a href='add_genre.php?delete={$genre_id}'>Delete<a/></td>";
     echo "<td><a href='add_genre.php?edit={$genre_id}'>Edit<a/></td>";
     echo "</tr>";
 }          
}
/*
* Delete genres
*/
function delete_genres() {  
    global $connection;  
      if(isset($_GET['delete'])) {
      $the_genre_id = $_GET['delete'];
      $query = "DELETE FROM genres WHERE genre_id = {$the_genre_id} ";
      $delete_query = mysqli_query($connection, $query);
      header("Location: add_genre.php");
  }   
}
/*
* Get all movies from the database
*/
function get_movies(){    
    global $connection;  
    $query = "SELECT * FROM movies" ;
   $select_movies = mysqli_query($connection, $query);       
    while($row = mysqli_fetch_assoc($select_movies)) {
        $movie_id = $row['movie_id'];
        $movie_title = $row['movie_title'];
        $movie_image = $row['movie_image'];
        $movie_genre = $row['movie_genre'];
        $movie_description = $row['movie_description'];
        $movie_age = $row['movie_age'];
        $movie_rating = $row['movie_rating'];
        $movie_youtube = $row['movie_youtube'];
        $movie_tags = $row['movie_tags'];
            echo "<tr>";
            echo "<td>$movie_id</td>";
            echo "<td>$movie_title</td>";
            echo "<td><img width='200' src='../images/$movie_image'></td>";
            echo "<td>$movie_genre</td>";
            echo "<td>$movie_description</td>";
            echo "<td>$movie_rating</td>";
            echo "<td>$movie_age</td>";
            echo "<td>$movie_youtube</td>";
            echo "<td>$movie_tags</td>";
            echo "<td><a href='edit_movie.php?edit={$movie_id}'>Edit<a/></td>";
            echo "<td><a href='view_all_media.php?delete={$movie_id}'>Delete</td>";
            echo "</tr>";
    } 
}
/*
* Get all series from the database
*/
function get_series(){ 
    global $connection;
       $query = "SELECT * FROM series" ;
   $select_series = mysqli_query($connection, $query);     
    while($row = mysqli_fetch_assoc($select_series)) {
        $serie_id = $row['serie_id'];
        $serie_title = $row['serie_title'];
        $serie_image = $row['serie_image'];
        $serie_genre = $row['serie_genre'];
        $serie_description = $row['serie_description'];
        $serie_age = $row['serie_age'];
        $serie_rating = $row['serie_rating'];
        $serie_youtube = $row['serie_youtube'];
        $serie_tags = $row['serie_tags'];
        $serie_seasons = $row['serie_seasons'];
        $serie_episodes = $row['serie_episodes'];  
            echo "<tr>";
            echo "<td>$serie_id</td>";
            echo "<td>$serie_title</td>";
            echo "<td><img width='200' src='../images/$serie_image'></td>";
            echo "<td>$serie_genre</td>";
            echo "<td>$serie_description</td>";
            echo "<td>$serie_rating</td>";
            echo "<td>$serie_age</td>";
            echo "<td>$serie_youtube</td>";
            echo "<td>$serie_tags</td>";
            echo "<td>$serie_seasons</td>";
            echo "<td>$serie_episodes</td>";
            echo "<td><a href='edit_serie.php?edit={$serie_id}'>Edit<a/></td>";
            echo "<td><a href='view_all_media.php?delete={$serie_id}'>Delete</td>";
            echo "</tr>";
    }     
}
?>