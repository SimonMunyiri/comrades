<?php 
// Connect the project to the database
// Database name - comardes
include "db_connect.php";

// start session
session_start();

// create a session for the logged in user
$active_id = $_SESSION['id'];

// check if the user is logged in
// If user isn't logged in, redirect
// them to the login page
if(!isset($_SESSION['phone']))
{
  header('location:login.php');
}

// Name of the product
$appName = 'Comrades SP';

// Fetch user's data from the register table
$userProfile = mysqli_query($conn,"SELECT * FROM register WHERE id='$active_id'");

 // Get user's data from the register's table
$userProfileRow = mysqli_fetch_assoc($userProfile);

# first name of the user
$fname = $userProfileRow['FirstName'];

# last name of the user
$lname = $userProfileRow['LastName'];

# phone number
$pname = $userProfileRow['phone'];

# gender
$gender = $userProfileRow['gender'];

# nationality
$nationality = $userProfileRow['nationality'];

# school 
$School = $userProfileRow['School'];

# course
$course = $userProfileRow['course'];

# bio data
$bio_data = $userProfileRow['bio_data'];

#profile photo
$profilePicture = 'photos/profile/'.$userProfileRow['profile_pic'];

# user id
$userId = $userProfileRow['id']; 

# default profile picture
$defaultProfilePhoto='photos/default_photos/one.jpg';

# account type
$acc_type=$userProfileRow['acc_type'];

#phone number
$phone = $userProfileRow['phone'];

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title><?php echo $appName; ?></title>

<!-- link to external css file -->
<link rel="stylesheet" type="text/css" href="css/styles.css">

<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist\css\bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist\css\bootstrap-grid.rtl.css">

<link rel="stylesheet" type="text/css" href="lib\fontawesome-free-6.6.0-web\css\all.css">


<script type="text/javascript" src="js/jquery.js"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  
  <!--google Ads-->
  <script data-ad-client="ca-pub-6186484637947070" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>