<?php
     $connection = mysqli_connect("localhost:3307","root","");
     $db = mysqli_select_db($connection,"dbcrud");
     $edit = $_GET['edit'];
     $sql = "select * from student where id='$edit'";

     $run = mysqli_query($connection,$sql);

     while($row=mysqli_fetch_array($run))
     {
     	$uid = $row['id'];
    	$name = $row['name'];
    	$address = $row['address'];
    	$mobile = $row['mobile'];
     }
?>


<?php
$connection = mysqli_connect("localhost:3307","root","");
$db = mysqli_select_db($connection,"dbcrud");

if(isset($_POST["submit"]))
{
	$edit = $_GET['edit'];
  $name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$sql="update student set name='$name',address='$address',mobile='$mobile' where id='$edit'";

	if(mysqli_query($connection,$sql))
	{
		echo '<script>location.replace("index.php")</script>';
	}
else
{
	echo "some thing error".$connection->error;
}
}
?>

<html>
	<head>
		<title>Student Crud Application</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-md-10">
				<div class="card">
  <div class="card-header">
    <h1>Student Crud Application</h1>
  </div>
  <div class="card-body">
  <form action="index2.php"method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter name"name="name"value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" placeholder="Enter address"name="address"value="<?php echo $address; ?>">
    </div>
    <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" placeholder="Enter mobile"name="mobile"value="<?php echo $mobile; ?>">
    </div>
    <br>
  <input type="submit" class="btn btn-primary"name="submit"value="Edit">
</form>
  	
  </div>
</div>
			
		</div>
		</div>
		</div>
	</body>
</html>