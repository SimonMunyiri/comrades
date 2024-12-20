<?php
// Connect the project to the database
include "connection.php";

// Default profile picture
$defaultProfilePhotoStudent='photos/default_photos/one.jpeg';

// Query database data
$getStudents = mysqli_query($conn,"SELECT * FROM register WHERE id!='$active_id' ORDER BY FirstName ASC");

// Fetching data from the database
$getStudentsNum=mysqli_num_rows($getStudents);

if(isset($_POST['getProfile']))
{
	$student_id = $_POST['StudentID'];
	$_SESSION['StudentID'] = $student_id;
	header('location:inbox.php');
	
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#students{
           border:1px solid lightblue;
		}
		#actual_students{
			margin:10px;
			
		}
		#search{
			width:90%;
            height:30px;
            border-radius:4px;
            border:1px solid #000;
		}
	</style>
</head>
<body>
<div id="body_center">
	<div id="students">
		<p style="background:lightblue;padding:10px;font-weight: bold;">Select account (
			<small style="font-size:15px;">
			<?php

			if($getStudentsNum>=1000&&$getStudentsNum<1000000)
			{
				$kNum=$getStudentsNum/1000;
				echo $kNum."k";
			}
			else{
				echo $getStudentsNum;
			}
			
			?>
			).
		   </small>
		</p>
		<center>
		<form>
			<input type="search" name="search" id="search" placeholder="Search student by name or phone number.">
		</form>
	     </center>
	     <p style="width:98%;margin:auto;padding:3px;background:#eee;"></p> 
		<div id="actual_students">
			<?php
			while($getStudentsRow=mysqli_fetch_assoc($getStudents))
			{
				$studentsProfilePhoto='photos/profile/'.$getStudentsRow['profile_pic'];
                ?>
                <form action="chat_students.php" method="POST" enctype="multipart/form-data">
                	<input type="text" name="StudentID" value="<?php echo $getStudentsRow['id'];?>" style="display:none;">
                	<button type="submit" name="getProfile" style="background: transparent;border:none;">
                		<table>
		                    <tr>
			                    <td>
				                    <?php
				                    if($getStudentsRow['profile_pic']=="")
				                    {
				                    	?>
				                     <img src="<?php echo $defaultProfilePhotoStudent; ?>" height="50" width="50" id="profilePicture">
				                     <?php
				                    }
				                    else{
				                    ?>
				                   <img src="<?php echo $studentsProfilePhoto; ?>" height="50" width="50" id="profilePicture">
				                        <?php 
			                        }
			                        ?>
			                        </td>
			                        <td>
			                        	<b id="profileName"><?php echo $getStudentsRow['FirstName']." ".$getStudentsRow['LastName'];?></b>
			                        	<br>
			                        	<?php
                                        if($getStudentsRow['course']!='')
                                        {
                                        	echo '<small class="color:gray;">'.$getStudentsRow['course'].'.</small>';
                                        }
                                        elseif($getStudentsRow['course']==''&& $getStudentsRow['School']!='')
                                        {
                                        	echo '<small class="color:gray;">School of '.$getStudentsRow['School'].'.</small>';
                                        }
                                        else{
                                        	echo '<small class="color:gray;">Currently a student at DeKUT.</small>';
                                        }
			                        	?>
			                        </td>
			                        <td></td>
		                        </tr>
	                        </table> 

                	</button>
                	<p style="width:98%;margin:auto;padding:3px;background:#eee;"></p>  
                </form>
                <?php
			}


			?>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    
    $('#search').keyup(function(){
      var txt=$(this).val();
          if(txt!=""){
        
        $.ajax({
          url:"search_to_chat.php",
          method:"post",
          data:{search:txt},
          dataType:"text",
          success:function(data)
          {
            $('#actual_students').html(data);
          }
        });
      }
      else{
        $('#actual_students').html("");
      }
      
      
    });
  });
</script>
</body>
</html>