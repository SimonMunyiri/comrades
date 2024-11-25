<?php 
# @author ~ Kamangaru
# Connect to the database
include "db_connect.php"; 

# send data to the database
# register user
if(isset($_POST['register']))
{
	// session_start();
	// get the data from the user for sending
	// to the database
	$firstName   	 = $_POST['fname'];      	   // First name
	$lastName    	 = $_POST['lname'];      	   // Last name
	$phone       	 = $_POST['phone'];      	   // phone
	$gender      	 = $_POST['gender'];     	   // Gender
	$nationality 	 = $_POST['Nationality'];	   // Nationality
	$school 	 	 = $_POST['school']; 	 	   // School
	$course 	 	 = $_POST['course'];     	   // Course
	$password   	 = $_POST['password'];   	   // password	
	$hashed_pass 	 = md5($password);       	   // hash password before storing


    // Send data to the database
    // Data stored in 'register' table
    // The table contains all user's data
    $register = mysqli_query($conn, "INSERT INTO register(FirstName, LastName, phone, gender, nationality, School, course, password) VALUES('$firstName', '$lastName', '$phone', '$gender', '$nationality', '$school', '$course', '$hashed_pass')"); 

    // After data is sent to the database,
    // Alert the user
	if($register)
	{
		# after the user has been registered successfully:-
		#     - Log in the user automatically
		#     - Alert the user that their accounts have been created successfully

		# Register success alert
		$success = "Congratulations, we have successfully created an account for you.";

		# Fetch the id of the account that the user has just created
		# DB Query
		$dbQuery = mysqli_query($conn,
					"SELECT * FROM register WHERE phone='$phone'"
					);

	    # Number of rows queried
		$numberOfRows = mysqli_num_rows($dbQuery);

		# Fetch data
		# only when there are some rows affected
		if ($numberOfRows > 0)
		{
			$row = mysqli_fetch_assoc($dbQuery);

			# id of the user who just created the account
			$newId = $row['id'];

			# Start session
			session_start();

			# Add the id fetched to session
			$_SESSION['id'] = $newId;

			# Redirect the user to the index.php page
			header("location:index.php");
		}	

	}
	else{
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
                                    <a href="register.php">
                                        <h2 style="color: green;">COMARDES SP</h2>
                                    </a>
                                    
                                </div>

                                <form action="register.php" enctype="multipart/form-data" method="POST">
									<!-- First Name -->
									<div class="form-group mb-3">
                                        <label for="first-name">First Name</label>
                                        <input class="form-control" name="fname" type="text" id="first-name" required="" placeholder="First Name">
                                    </div>

									<!-- Last Name -->
									<div class="form-group mb-3">
                                        <label for="last-name">Last Name</label>
                                        <input class="form-control" name="lname" type="text" id="last-name" required="" placeholder="Last Name">
                                    </div>

									
									
									
									<!-- Gender -->
                                    <div class="form-group mb-3">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
 											<option value="">Select Gender</option>
 											<option value="male">Male</option>
 											<option value="female">Female</option>

 										</select>
                                    </div>
									
									<!-- Phone Number -->
									<div class="form-group mb-3">
                                        <label for="phone-number">Phone Number</label>
                                        <input class="form-control" name="phone" type="phone" id="phone-number" required="" placeholder="Phone Number">
                                    </div>

									<!-- Phone Number -->
									<div class="form-group mb-3">
                                        <label for="nationality">Nationality</label>
                                        <input class="form-control" name="Nationality" type="text" id="nationality" required="" placeholder="Nationality">
                                    </div>

									<!-- School -->
									<div class="form-group mb-3">
                                        <label for="school">School</label>
                                        <input class="form-control" name="school" type="text" id="school" required="" placeholder="School">
                                    </div>

									<!-- School -->
									<div class="form-group mb-3">
                                        <label for="course">Course</label>
                                        <input class="form-control" name="course" type="text" id="course" required="" placeholder="Course">
                                    </div>

									<!-- Password -->
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>


                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="register" type="submit"> Create Account </button>
                                    </div>

                                </form>

                              

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="login_page.php" class="text-white-50 ml-1">Already have an account? Log In</a></p>
                              
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
