<!-- insert likes to database  -->

<?php
include "connection.php";
        // php // code for like
if(isset($_POST['myEmail'])||isset($_POST['post_id'])){
  // save the id of the post in a variable
 

  $uname = $_POST['myEmail'];//person who is currently logged in ....
  $post_id = $_POST['post_id']; // Id of the post
  
  
    $deleteLike = mysqli_query($conn,"DELETE FROM likes WHERE post='$post_id'"); 
 
   
     
      // notify users
     
     // }
   
      
     
    //}
 }



?>