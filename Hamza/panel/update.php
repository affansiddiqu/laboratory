<?php

require('../config.php');

$userid = $_POST['id'];
$date = $_POST['date'];
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$inves = $_POST['investigation'];
$referred = $_POST['by'];
$amount = $_POST['T_amount'];
$payment = $_POST['A_payment'];
$discount = $_POST['Discount'];
$welfare = $_POST['Welfare'];
$b_due = $_POST['B_due'];
$received = $_POST['R_by'];

$query = "UPDATE form_data 
          SET date = '$date', name = '$name', age = '$age', sex = '$sex', investigation = '$inves', refered_by = '$referred', total_amount = '$amount', advance_payment = '$payment', discount = '$discount', wealfare = '$welfare', balance_due = '$b_due', received_by ='$received' 
          WHERE id = '$userid'";

          $result = mysqli_query($connection , $query);      
          
          header("location: hamza_data.php");

?>