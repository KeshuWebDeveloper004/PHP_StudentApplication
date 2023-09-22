<html>
	<head>
		<title>Student Crud Application</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
      body
      {
       background-image:url("https://wallpapers.com/images/hd/artistic-school-clipart-background-1uir61mblo42se8r.jpg");
       background-repeat:no-repeat;
       background-size:cover;
      }
      .card-body
      {
        background-color:rgba(255, 255, 255, 0.5);
      }
      .container
      {
        margin-left:12%;
        font-weight:700;
      }
      h1
      {
        text-align:center;
      }
      .table th
      {
        background-color:burlywood;
      }
      .table td
      {
        background-color:burlywood;
      }
    </style>
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

  	<button class="btn btn-success"><a href="index2.php"class="text-light">Add New</a></button>
  <br>
  <br>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $connection = mysqli_connect("localhost:3307","root","");
    $db = mysqli_select_db($connection,"dbcrud");

    $sql = "select * from student";
    $run = mysqli_query($connection,$sql);

    $id=1;

    while($row = mysqli_fetch_array($run))
    {
    	$uid = $row['id'];
    	$name = $row['name'];
    	$address = $row['address'];
    	$mobile = $row['mobile'];
    ?>

    <tr>
    	<td><?php echo $id ?></td>
    	<td><?php echo $name ?></td>
    	<td><?php echo $address ?></td>
    	<td><?php echo $mobile ?></td>

    	<td>
    		<button class="btn btn-success"><a href='edit.php?edit=<?php echo $uid ?>'class="text-light">Edit</a></button> &nbsp;
    		<button class="btn btn-danger"><a href='delete.php?del=<?php echo $uid ?>'class="text-light">Delete</a></button>
    	</td>
    </tr>

<?php $id++;} ?>
  </tbody>
</table>
  </div>
</div>
			
		</div>
		</div>
		</div>
	</body>
</html>