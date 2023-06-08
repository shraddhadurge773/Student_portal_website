<?php
session_start();
include('connect.php');
if (empty($_SESSION['uid']))

{
	header('location:index.php');
}


if (isset($_POST['btn'])) 
{
	$ldate = date('Y-m-d');
	$uid = $_SESSION['uid'];
	$uname = $_SESSION['uname'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];

mysqli_query($con,"INSERT INTO leaving (`ldate`,`uid`,`uname`,`subject`,`description`) VALUES ('$ldate','$uid','$uname','$subject','$description')");

echo "<script>
    alert('Leaving Upload Successfully!..');
    window.location.href='query.php';
</script>";

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leaving Page </title>
	<?php include('bootcdn.php')?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

        <!-- top section start -->
		<div class="well well-sm">
			<span class="glyphicon glyphicon-edit"></span>
			LEAVING PAGE
			
		</div>
		<!-- top section end -->



		 <!-- form section start -->
      <div class="row">
      	
      	<div class="col-sm-5">
      		
      		<form method="post" enctype="multipart/form/data">

      			<div class="panel panel-default">
      				
      				<div class="panel-heading">

      					<h3>Upload New Application</h3>
      					
      				</div>

      				<div class="panel-body">

                     <label>Subject</label>
                     <input type="text" name="subject" class="form-control"required>
                     <br>

                     <label>Description</label>
                     <textarea rows="4" name="description" class="form-control"required></textarea>
                     <br>

      				</div>

      				<div class="panel-footer">
      					<button type="submit"name="btn"class="btn btn-primary btn-block">Send Application</button>
      					
      				</div>
      			</div>
      			
      		</form>
      	</div>

      </div>
      <div class="col-sm-7">
      	<h4>Application List:-</h4>
      	
      </div>


      <!--form section end  -->



	</div>

</body>
</html>