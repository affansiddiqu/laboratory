<?php

require('../config.php');

$userid = $_POST['id'];
$date = $_POST['date'];
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$inves = $_POST['investigation'];
$referred = $_POST['by'];

$query = "UPDATE foc_data 
          SET date = '$date', name = '$name', age = '$age', sex = '$sex', investigation = '$inves', refered_by = '$referred' WHERE id = '$userid'";

          $result = mysqli_query($connection , $query);      
          
          header("location: foc_data.php");

?>