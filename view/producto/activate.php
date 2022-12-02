<?php
  
    // Connect to database 
    $con=mysqli_connect("localhost","root","","proyecto");
  
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['cod'])){
  
        // Store the value from get to a 
        // local variable "course_id"
        $course_id=$_GET['cod'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `Producto` SET 
             `EstadoProducto`=1 WHERE cod='$course_id'";
  
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    header('location: http://localhost/Infernum.sb/view/IndexProducto.php');
?>