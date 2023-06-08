<?php
session_start();
include('connect.php');
if (empty($_SESSION['uid']))

{
	header('location:index.php');
}

if(isset($_POST['btn']))
{
	$udate = date('Y-m-d');
	$uid = $_SESSION['uid'];
	$uname = $_SESSION['uname'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$docs = $_FILES['docs']['name'];

	mysqli_query($con,"INSERT INTO upload (`udate`,`uid`,`uname`,`title`,`description`,`docs`) VALUES('$udate','$uid','$uname','$title','$description','$docs')");

   $dir = "images/";
	$docs = $_FILES['docs']['name'];
	$tmp_docs = $_FILES['docs']['tmp_name'];

	move_uploaded_file($tmp_docs,$dir.$docs);

	echo "<script>
      alert('Upload Success !..');
      window.location.href = 'add.php';
	</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Add New  Page </title>
	<?php include('bootcdn.php')?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

        <!-- top section start -->
		<div class="well well-sm">
			<span class="glyphicon glyphicon-plus"></span>
			ADD NEW PAGE
			
		</div>
		<!-- top section end -->

      <!-- form section start -->
      <div class="row">
      	
      	<div class="col-sm-6">
      		
      		<form method="post" enctype="multipart/form-data">

      			<div class="panel panel-default">
      				
      				<div class="panel-heading">

      					<h3>Upload New Information</h3>
      					
      				</div>

      				<div class="panel-body">

                     <label>Enter Title</label>
                     <input type="text" name="title" class="form-control"required>
                     <br>

                     <label>Description</label>
                     <textarea rows="4" name="description" class="form-control"required></textarea>
                     <br>

                     <label>Upload File/Document</label>
                     <input type="file" name="docs" class="form-control"required >
      					
      				</div>

      				<div class="panel-footer">
      					<button type="submit"name="btn"class="btn btn-primary btn-block">Upload</button>
      					
      				</div>
      			</div>
      			
      		</form>
      	</div>

      </div>


      <!--form section end  -->




	</div>

</body>
</html>