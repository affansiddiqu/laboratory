<?php
session_start();

if(isset($_SESSION["username"])){
  header('location: panel/index.php');
}

include('config.php');

if(isset($_POST['login'])){
  $login_email = $_POST['lname'];
  $login_pass = $_POST['password'];

  $log_query = "select * from Alishba where name = '$login_email'";
  $login_conn = mysqli_query($connection, $log_query);

  if(mysqli_num_rows($login_conn) > 0){
    $row = mysqli_fetch_assoc($login_conn);
    $db_pass = $row['password'];
    $pass_check = password_verify($login_pass , $db_pass);

    if($pass_check){
      session_start();
      $_SESSION["username"] = $row['name'];
      header('location: panel/index.php');
    }else{
      echo "<script> alert('Invalid Name/Password')</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dr. Farzana's Diagnostic Centre</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f7f7f7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      width: 100%;
      max-width: 400px;
    }

    .card-header {
      text-align: center;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group button {
      width: 100%;
    }

    .switch-form {
      text-align: center;
      margin-top: 1rem;
    }
  </style>
</head>
<body>

  <div class="card shadow-sm">
    <div class="card-header">
      <h3>Alishba Login Form</h3>
    </div>
    <div class="card-body">
      <!-- Login Form -->
      <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="lname" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
        </div>
        <input value="login" type="submit" class="btn btn-secondary btn-user btn-block" name="login" >
      </form>

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>