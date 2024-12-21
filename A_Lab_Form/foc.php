<?php
include('config.php');

// Get the last inserted ID (serial number) from the database
$query = "SELECT MAX(id) as last_id FROM foc_data";
$result = mysqli_query($connection, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $serial_number = $row['last_id'] + 1;
} else {
    $serial_number = 1; // If no records exist, set the serial number to 1
}

if (isset($_POST['add'])) {
    // Retrieve form input values
    $date = $_POST['date'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $inves = $_POST['investigation'];
    $referred = $_POST['referred_dr'];

    // Insert the new form data into the database
    $insert = "INSERT INTO `foc_data`(`date`, `name`, `age`, `sex`, `investigation`, `refered_by`) 
        VALUES 
        ('$date', '$name', '$age', '$sex', '$inves', '$referred')";
        $query=mysqli_query($connection , $insert);

        header("Location: foc.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Farzana's Diagnostic Centre</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://use.fontawesome.com/ccb21b5b72.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container-fluid mt-3 doc" style="max-height:120px;">
    <div class="doc-item">
        <h1>Dr. Farzana's</h1>
        <h2>Diagnostic Centre</h2>
    </div>
    
    <!-- Image with bottom margin -->
    <img src="img/images.png" alt="" >
    
    <h1>ڈاکٹر فرذانہ ڈائیگنوسٹاک سینٹر‎</h1>
    
</div>  

    <div class="text-center mt-3">

<p>A REGISTERED ORGANIZATION SINDH HEALTH CARE COMMISSION (REG.NO.814) </p>
<p>Timing:8:30 am to 7:30 pm Sunday:9:00 to 1:00 pm</p>
</div>  

    
    <section class="container">
        <h1>Enter Details Foc Form</h1>
          <div class="text-end"> 
        <a href="index.php" class="btn btn-dark">Simple Form</a>
        </div>
        </div>
        <!-- Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="post">
    <div class="form-row">
        <div class="input-box">
            <label>Serial Number</label>
            <input readonly name="serial_number" value=" <?php echo $serial_number ?>" required />
        </div>

        <div class="input-box">
            <label>Date</label>
            <input type="date" name="date" value="" required />
        </div>

        <div class="input-box">
            <label>Name</label>
            <input type="text" name="name" required />
        </div>

        <div class="input-box">
            <label for="age">Age</label>
            <input type="number" name="age" required />
        </div>

        <div class="input-box">
            <label for="sex">Sex</label>
            <select class="form-select" name="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>

    <br>

    <div class="column">
        <div class="input-box">
            <label for="investigation">Investigation</label>
            <textarea class="form-control" rows="3" name="investigation"></textarea>
        </div>
    </div>

    <div class="column">
        <div class="input-box">
            <label for="referred_dr">Referred By</label>
            <input type="text" name="referred_dr" />
        </div>
    </div>

        <div class="text-end"> 
        <input type="submit" name="add" value="Submit" class="mt-4 btn btn-danger">
        </div>
        </div>
    <div class="form-row">
        <div class="input-box">
            <h6>
                A3,/8,Shahrah-e-Waqas <br> Near Ruby Cinema <br> Saeedabad , Karachi.
            </h6>
            </div>
        <div class="input-box">
            <h6>
                M Hamza Rizwan 0325-6063193 <br>Number 0335-2150953 <br> Email dr.farzanalab603@gmail.com
            </h6>
        </div>
        <div class="input-box">
            <h4>
        نوٹ : رپورٹ پندرہ دن  <br> کے اندر لے جائیں  <br>شکریہ</h4>
        </div>
</form>

    </section>
    <!-- footer  -->
      <br>
      <br>

      <div class="container-fluid p-3">
        <div class="mt-3">
          <p class="text-center">Copyright &copy; Muhammad Affan Siddiqui</p>
        </div>
        </div>
</body>
</html>