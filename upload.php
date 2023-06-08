<?php
session_start();
include('connect.php');
if (empty($_SESSION['uid']))

{
	header('location:index.php');
}

error_reporting(0);

$id = $_GET['id'];
mysqli_query($con,"DELETE FROM upload WHERE id = '".$id."' ");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload List Page </title>
	<?php include('bootcdn.php')?>

	<style type="text/css">
		.table-bordered thead tr th {background-color: lightgrey;}
	</style>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

        <!-- top section start -->
		<div class="well well-sm">
			<span class="glyphicon glyphicon-list"></span>
			UPLOAD LIST PAGE
			
		</div>
		<!-- top section end -->

        <!-- upload list start -->
         <div class="row">

         	<div class="col-sm-3">
         		<input type="text"class="form-control"id="myInput"placeholder="Filter here..."autofocus>
         		<script>
                 $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
               $("#myTable tr").filter(function() {
                 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
         	</div>

         	<div class="col-sm-7">
         	</div>

         	<div class="col-sm-2">
         		<a title="Print Data Sheet"class="btn btn-danger"href="">
         			<span class="glyphicon glyphicon-print"></span>
         			Print
         		</a>
         		
         	</div>
         		
         	</div>
         	<br>
            
            <h4>Search by date:</h4>
         	<div class="table-responsiv">

         		<table class="table table-bordered table-hover table-striped">
         			<thead>
         				<tr>
         					<th>Upload Id</th>
         					<th>Upload Date</th>
         					<th>User Id</th>
         					<th>Name</th>
         					<th>Title</th>
         					<th>Description</th>
         					<th>File/Document</th>
         					<th>Action</th>
         				</tr>
         			</thead>

         			<tbody id ="myTable">
         				<?php
                         
                         $sql = mysqli_query($con,"SELECT * FROM Upload WHERE uid = '".$_SESSION['uid']."' ");
                         while ($result = mysqli_fetch_assoc($sql)) 
                         {
                         ?>

                         <tr>
                         	<td><?php echo $result['id']  ?></td>
                         	<td><?php echo $result['udate']  ?></td>
                         	<td><?php echo $result['uid']  ?></td>
                         	<td><?php echo $result['uname']  ?></td>
                         	<td><?php echo $result['title']  ?></td>
                         	<td><?php echo $result['description']  ?></td>

                         	<td>
                         		<a href="<?php echo 'images/'.$result['docs']  ?>" target = "blank">
                         		<?php echo $result['docs']  ?>
                         	   </a>  
                         			
                         	</td>

                         	<td>
                         		<a onclick="return confirm('Are you sure?')" href="upload.php?id=<?php echo $result['id']  ?>">
                         			<span class="glyphicon glyphicon-trash">Delete</span>
                         		</a>
                         	</td>

                         </tr>

                       <?php } ?>

         			</tbody>
         			
         		</table>
         		
         	</div>
         	
         </div>


        <!-- upload list end -->



	</div>

</body>
</html>