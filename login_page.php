<?php 
// Connect to the database
include "db_connect.php";

if(isset($_POST['login']))
{
    // Start session
	session_start();

	$phone       = $_POST['phone'];     // phone
	$password    = $_POST['password'];  // password
	$hashed_pass = md5($password);      // Hash password

    $_SESSION['phone']    = $phone; 
    $_SESSION['password'] = $password;
    
    // Query data in the database
	$check = mysqli_query($conn,"SELECT * FROM register WHERE phone='$phone' AND password='$hashed_pass'");

    // number of rows that match the query
	$checkNum = mysqli_num_rows($check); 

	if($checkNum == 1)
	{
		$row            = mysqli_fetch_assoc($check); 
		$loggedInId     = $row['id']; // Id of the user who just registered
		$_SESSION['id'] = $loggedInId; // add the id to session to login the user
		header('location:index.php'); // redirect the user to the platform
	}
	else {
        $err = "Access Denied. Please Check Your Credentials";
     
	}
}
?>






<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Comrades SP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="Kamangaru The Developer" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        
        <script src="assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function () 
            { 
                swal("Failed","<?php echo $err;?>","Failed");
            },
            100);
       </script>

        <?php } ?>



    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="login_page.php">
                                        <h2 style="color: green;">COMARDES SP</h2>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your Phone Number and password to access your account.</p>
                                </div>

                                <form action="login_page.php" enctype="multipart/form-data" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Phone Number</label>
                                        <input class="form-control" name="phone" type="phone" id="phone" required="" placeholder="Phone Number">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="login" type="submit"> Log In </button>
                                    </div>

                                </form>

                              

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="register.php" class="text-white-50 ml-1">Don't have an account? Sign up</a></p>
                              
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> 
                                    
                                    <a href="helpdesk.php" class="text-white-50 ml-1">Help</a> |
	                                <a href="aboutus.php" class="text-white-50 ml-1">About us</a> |
	                                <a href="hostelLogin.php" class="text-white-50 ml-1">Landlord login</a> |
	                                <a href="" class="text-white-50 ml-1">Terms & Conditions</a>
                               </p>
                              
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <?php include ("assets/inc/footer1.php");?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>
