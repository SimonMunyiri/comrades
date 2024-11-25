<!-- insert likes to database  -->

<?php
include "connection.php";
        // php // code for like
if(isset($_POST['myEmail'])||isset($_POST['post_id'])){
  // save the id of the post in a variable
 

  $uname = $_POST['myEmail'];//person who is currently logged in ....
  $post_id = $_POST['post_id']; // Id of the post
 
  // Add likes to the database only when the user in question hasn't liked the post
 
      $likeQuery = mysqli_query($conn,"INSERT INTO likes(post,friendEmail)VALUES('$post_id','$uname')");
       $sendNotification = mysqli_query($conn,"INSERT INTO notifications(post_id,notification_type,notification_receiver)VALUES('$post_id','like','$userId')");

 }



?>