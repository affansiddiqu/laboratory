<?php 
include('admin/includes/header.php'); 
include('admin/includes/sidebar.php'); 
include('admin/includes/topbar.php'); 
require("../config.php");  
$userid = $_GET['id'];   
$query = "select * from `form_data` where id = '{$userid}'";  
$retl = mysqli_query($connection , $query); 

if(!$retl){     
    die("query fail"); 
}

if (mysqli_num_rows($retl) > 0 ) {      
    while($row = mysqli_fetch_assoc($retl)) {         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Farzana's Diagnostic Centre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://use.fontawesome.com/ccb21b5b72.js"></script>
</head>
<body>

    <section class="container">
        <h1>Enter Details</h1>
       
        <form action="update.php" class="form" method="post">
            <div class="form-row">
                <div class="input-box">
                    <label>Serial Number</label>
                    <input type="hidden" name="id" value="<?php echo $userid; ?>" />
                </div>

                <div class="input-box">
                    <label>Date</label>
                    <input type="date" name="date" value="<?php echo $row['date'];?>" required />
                </div>

                <div class="input-box">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" required />
                </div>

                <div class="input-box">
                    <label for="age">Age</label>
                    <input type="number" name="age" value="<?php echo $row['age'];?>" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="sex">Sex</label>
                    <select class="form-select" name="sex">
                        <option value="Male" <?php echo ($row['sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($row['sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="investigation">Investigation</label>
                    <input type="text" name="investigation" value="<?php echo $row['investigation'];?>" />
                </div>
            </div>

            <div class="form-row">
                <div class="input-box">
                    <label>Referred By</label>
                    <input type="text" name="by" value="<?php echo $row['refered_by'];?>" required />
                </div>
            </div>

            <div class="form-row">
                <div class="input-box">
                    <label>Total Amount</label>
                    <input type="number" name="T_amount" value="<?php echo $row['total_amount'];?>" required />
                </div>

                <div class="input-box">
                    <label>Advance Payment</label>
                    <input type="number" name="A_payment" value="<?php echo $row['advance_payment'];?>" required />
                </div>

                <div class="input-box">
                    <label>Discount</label>
                    <input type="number" name="Discount" value="<?php echo $row['discount'];?>" required />
                </div>

                <div class="input-box">
                    <label for="welfare">Welfare</label>
                    <input type="text" name="Welfare" value="<?php echo $row['wealfare'];?>" required />
                </div>

                <div class="input-box">
                    <label for="balance">Balance Due</label>
                    <input type="number" name="B_due" value="<?php echo $row['balance_due'];?>" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="Received_by">Received By</label>
                    <select class="form-select" name="R_by">
                        <option value="Rizwan Ansari" <?php echo ($row['received_by'] == 'Rizwan Ansari') ? 'selected' : ''; ?>>Rizwan Ansari</option>
                        <option value="Rizwan Sheikh" <?php echo ($row['received_by'] == 'Rizwan Sheikh') ? 'selected' : ''; ?>>Rizwan Sheikh</option>
                        <option value="Hamza" <?php echo ($row['received_by'] == 'Hamza') ? 'selected' : ''; ?>>Hamza</option>
                        <option value="Alishba" <?php echo ($row['received_by'] == 'Alishba') ? 'selected' : ''; ?>>Alishba</option>
                    </select>
                </div>
            </div>

            <div class="text-end">
                <input type="submit" name="add" value="Submit" class="mt-4 btn btn-danger">
            </div>
        </form>
    </section>
</body>
</html>
<?php } } ?>
