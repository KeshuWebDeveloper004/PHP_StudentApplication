<?php
     $connection = mysqli_connect("localhost:3307","root","");
     $db = mysqli_select_db($connection,"dbcrud");
     $delete = $_GET['del'];

     $sql = "delete from student where id='$delete'";
     if(mysqli_query($connection,$sql))
     {
          echo '<script>location.replace("index.php")</script>';
     }
     else
     {
        echo "some thing error".$connection->error;   
     }
?>