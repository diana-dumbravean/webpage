<form class="form" action="" method="post" id="form1">
    <div class="genres">
        <label for="genre_title">Edit Genre</label>
        <?php
/*
* Update genres from the database
*/ 
    if(isset($_GET['edit'])){       
            $genre_id = $_GET['edit'];    
        $query = "SELECT * FROM genres WHERE genre_id = $genre_id " ;
        $get_genres_id = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_genres_id)) {
        $genre_id = $row['genre_id'];
        $genre_title = $row['genre_title'];    
        ?>           
       <input value="<?php if(isset($genre_title)){echo $genre_title;} ?>" type="text" name="genre_title">             
       <?php }} ?>
        <?php  
            if(isset($_POST['update_genre'])) {
            $the_genre_title = $_POST['genre_title'];
            $query = "UPDATE genres SET genre_title = '{$the_genre_title}'  WHERE genre_id = {$genre_id} ";
            $update_query = mysqli_query($connection, $query);      
                if(!$update_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }              
}    
        ?>
    </div>
    <button type="update"  name="update_genre" value="Update">Update</button> 
</form>