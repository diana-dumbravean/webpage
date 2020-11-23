<?php include "admin_header.php"; ?>

<div class="genres">
    
   <?php insert_genres(); ?>
    
   
    <form class="form" action="" method="post" id="form1">
        <div class="genres">
            <label for="genre_title">Add Genre</label>
            <input type="text" name="genre_title">
        </div>
        

    <button type="submit" form="form1" name="submit" value="Submit">Submit</button>
    
    </form>
    
    
    <?php  // UPDATE AND INCLUDE QUERY
    if(isset($_GET['edit'])) {
        
        $genre_id = $_GET['edit'];
        
        include "update_genres.php";
    }
    
    
    ?>
  

</div>

<div class="table_genre">

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
    
    
<?php findAllGenres();   ?>  
 
    
<?php  delete_genres(); ?>
    
    </tbody>
</table>


</div>


<?php include "admin_footer.php"; ?>