<?php
session_start();

include('connect.php');

if (!empty($_SESSION['uid']))

{
	header('location:home.php');
}

if (isset($_POST['login'])) 
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$sdata=mysqli_query($con,"SELECT * FROM students WHERE `contact`='".$user."' AND `pass`='".$pass."' ");
	$result=mysqli_num_rows($sdata);

    while ($abc=mysqli_fetch_assoc($sdata)) 
    {
     $_SESSION['uid']=$abc['id'];
     $_SESSION['uname']=$abc['sname'];	
    }

	if($result>0)
	{
		//echo "Yes Login Success";
		header('location:home.php');
	}
	else
	{
		echo "<script>
		alert('Invalid Entry!..');

		window.location.href='index.php';
		</script>";
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>

	<title>Student Login Page</title>

	<?php  include('bootcdn.php');   
	?>

	

</head>
<body>

	<div class="container">
		<br><br><br><br><br><br>
        
        <!-- to create row -->
		<div class="col-sm-4">
			
		</div>
		
		<div class="col-sm-4">
			 <!-- login form start -->

			 <form method="post">

			 <div class="panel panel-default" style="background-color: rgba(255, 255, 255, 0.1);margin: 0 auto;padding: 20px;">
			 	<!-- heading section -->
			 	<div class="panel-heading">

			 		<h3>Student Login Page</h3>
			 		
			 	</div>
                 
                 <!-- body section -->
			 	<div class="panel-body">
			 		<span class="glyphicon glyphicon-user"></span>
			 		<label>Username</label>
			 		<input type="text" name="user" class="form-control" placeholder="Enter Name" autofocus>
			 		<br>
                     
                    <span class="glyphicon glyphicon-password"></span> 
			 		<label>Password</label>
			 		<input type="password" name="pass" class="form-control" placeholder="Enter Password" autofocus>
			 		
			 	</div>
                 <!-- footer section -->
			 	<div class="panel-footer" style="background-color: rgba(255, 255, 255, 0.1);margin: 0 auto;padding: 20px;">
			 		<button type="submit" name="login" class="btn btn-warning btn-block">Login</button>

			 		<br>

			 		<p>
			 			Don't have an account?
			 			<a href="signup.php">Sign Up</a>
			 		</p>

			 		<p>Go to
			 		<a href="admin/">Admin panel</a>
			 	   </p>
			 		
			 	</div>
			 	
			 	
			 	
			 </div>
           </form>

			 <!-- login form end -->
		</div>
		

	</div>

</body>
</html>
