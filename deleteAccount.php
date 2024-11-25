<?php
// Connect the projoh to the datavbse
include 'connection.php';

// Display a delete account notif on the screen

echo "Please wait as we delete your account";

if(isset($_POST['delete_account']))
{    

    // Delete all the posts by the user
    $delPosts = mysqli_query($conn,"DELETE FROM posts WHERE phone='$userId'");

    // Delete all the messages sent by the user and those received by 
    // the user
    $delMessages1 = mysqli_query($conn,"DELETE FROM messages WHERE my_id='$userId'");
    $delMessages2 = mysqli_query($conn,"DELETE FROM messages WHERE your_id='$userId'");

    // Delete conversations from the database
    $delConversation1 = mysqli_query($conn,"DELETE FROM conversations WHERE myId='$userId'");

    $delConversation2 = mysqli_query($conn,"DELETE FROM conversations WHERE yourId='$userId'");
    
    // Delete all notofications
    $delNotifications=mysqli_query($conn,"DELETE FROM notifications WHERE notification_receiver='$userId'");

    // Delete the data from register table              
    $del = mysqli_query($conn,"DELETE FROM register WHERE id='$userId'"); 

    // after deleting the account, destroy the session for the user
    session_destroy();

    // Redirect the user to the login page
    if($del)
    {
       	header('location:index.php');
    }
}

?>