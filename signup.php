<?php 

include('connect.php');

if(isset($_POST['reg']))
{
	$rdate = date('Y-m-d');
	$sname = $_POST['sname'];
	$contact = $_POST['contact'];
	$branch = $_POST['branch'];
	$address = $_POST['address'];
	$photo = $_FILES['photo']['name'];
	$pass =$_POST['pass'];

	mysqli_query($con,"INSERT INTO students (`rdate`,`sname`,`contact`,`branch`,`address`,`photo`,`pass`) VALUES ('$rdate','$sname','$contact','$branch','$address','$photo','$pass')");

  $dir = "images/";

  $photo =$_FILES['photo']['name'];
  $tmp_photo =$_FILES['photo']['tmp_name'];
  move_uploaded_file($tmp_photo,$dir.$photo);


	echo "<script>
       alert('Registration successful!..');
       window.location.href='index.php';
	</script>";

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Sign Up Form</title>
	<?php echo include('bootcdn.php');   

	?>

</head>
<body>

	<div class="container">
		<br><br><br><br>

		<div class="row">
			<div class="col-sm-3">
				
			</div>

			<div class="col-sm-6">
				<!-- sign up form start -->
                 <form method="post" enctype="multipart/form-data">
                 	<div class="panel panel-default" style="background-color: rgba(255, 255, 255, 0.1);margin: 0 auto;padding: 20px;">
                 		<div class="panel-heading">
                 			<h3>Student Registration Form </h3>
                 		</div>

                 		<div class="panel-body">

                 			<label>Student Name</label>
                 			<input type="text" name="sname" class="form-control" placeholder="Enter Name" autofocus required><br>

                 			<label>Contact Number</label>
                 			<input type="number" name="contact" class="form-control" placeholder="Enter No." autofocus required><br>

                 			<label>Branch</label>
                 			<select name="branch" class="form-control" required>
                 				<option value="">Select Branch</option>
                 				<option>CS</option>
                 				<option>ETC</option>
                 				<option>Chemical</option>
                 				<option>IT</option>
                 				<option>Civil</option>
                 				<option>Mechanical</option>
                 				
                 			</select>
                 			<br>

                 			<label>Address</label>
                 			<textarea name="address" class="form-control" required></textarea>
                 			<br>

                 			<label>Upload Image</label>
                 			<input type="file" name="photo" required>
                 			<br>


                 			  <label>Set Password</label>
                 			  <input type="text" name="pass"class="form-control"required>
                 			
                 			
                 		</div>

                 		<div class="panel-footer" style="background-color: rgba(255, 255, 255, 0.1);margin: 0 auto;padding: 20px;">
                 			
                          <button type="submit" name="reg" class="btn btn-primary">Sign Up</button>

                          <button type="reset" class="btn btn-primary">Reset</button>

                          <br>

                          <p>
                          	Go to
                          	<a href="index.php">Login Page</a>
                          </p>

                 		</div>
                 		
                 	</div>
                 	
                 </form>

				<!-- sign up form end -->
				
			</div>
			
			
		</div>
		
	</div>

</body>
</html>
