<?php
include('config.php');


// Get the last inserted ID (serial number) from the database
$query = "SELECT MAX(id) as last_id FROM form_data";
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
    $referred = $_POST['by'];
    $amount = $_POST['T_amount'];
    $payment = $_POST['A_payment'];
    $discount = $_POST['Discount'];
    $welfare = $_POST['Welfare'];
    $b_due = $_POST['B_due'];
    $received = $_POST['R_by'];

    // Insert the new form data into the database
    $insert = "INSERT INTO `form_data`(`date`, `name`, `age`, `sex`, `investigation`, `refered_by`, `total_amount`, `advance_payment`, `discount`, `wealfare`, `balance_due`, `received_by`) 
        VALUES 
        ('$date', '$name', '$age', '$sex', '$inves', '$referred', '$amount', '$payment', '$discount', '$welfare', '$b_due', '$received')";
        $query=mysqli_query($connection , $insert);

        header("Location: index.php");
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
        <img src="img/images.png" alt="">
        
        <h1>ڈاکٹر فرذانہ ڈائیگنوسٹاک سینٹر‎</h1>
        
    </div>  

    <div class="text-center mt-3">
        <p>A REGISTERED ORGANIZATION SINDH HEALTH CARE COMMISSION (REG.NO.814)</p>
        <p>Timing:8:30 am to 7:30 pm Sunday:9:00 to 1:00 pm</p>
    </div>  

    <section class="container">
        <h1>Enter Details</h1>
        <div class="text-end"> 
            <a href="foc.php" class="btn btn-dark">Foc Form</a>
        </div>

        <!-- Form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="post">
            <div class="form-row">
                <div class="input-box">
                    <label>Serial Number</label>
                    <!-- Display the Serial Number from the last inserted ID -->
                    <input readonly name="serial_number" value="<?php echo $serial_number; ?>" required />
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

            <div class="form-row">
                <div class="input-box">
                    <label>Referred By</label>
                    <input type="text" name="by" required />
                    </div>
                    </div>
                
            <div class="form-row">
                <div class="input-box">
                    <label>Total Amount</label>
                    <input type="number" name="T_amount" required />
                </div>

                <div class="input-box">
                    <label>Advance Payment</label>
                    <input type="number" name="A_payment" required />
                </div>

                <div class="input-box">
                    <label>Discount</label>
                    <input type="number" name="Discount" required />
                </div>

                <div class="input-box">
                    <label for="welfare">Welfare</label>
                    <input type="text" name="Welfare" required />
                </div>

                <div class="input-box">
                    <label for="balance">Balance Due</label>
                    <input type="number" name="B_due" required />
                </div>
            </div>

            <div class="column">
            <div class="input-box">
                    <label for="Received_by">Received By</label>
                    <select class="form-select" name="R_by">
                        <option value="Rizwan Ansari">Rizwan Ansari</option>
                        <option value="Rizwan Sheikh">Rizwan Sheikh</option>
                        <option value="Hamza">Hamza</option>
                        <option value="Alishba">Alishba</option>
                    </select>
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
<!-- <div id="result" class="mt-4"></div> -->

    </section>
    <!-- footer  -->
      <br>
      <br>
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
    <style>
        /* Print Styles */
        @media print {
            /* General Body Settings */
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            /* Hide elements that shouldn't appear when printing */
            .btn-danger, .text-center, #result {
                display: none;
            }

            /* Page Margin */
            @page {
                margin: 20mm;
            }

            /* Fixed Header */
            .doc-header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                text-align: center;
                padding: 10px;
                background-color: white;
                border-bottom: 2px solid #000;
                font-size: 18px;
                z-index: 999;
            }

            /* Fixed Footer */
            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                text-align: center;
                font-size: 14px;
                padding: 10px;
                background-color: white;
                border-top: 2px solid #000;
                z-index: 999;
            }

            /* Content Styling */
            #result {
                margin-top: 80px; /* Space below the fixed header */
                margin-bottom: 40px; /* Space above the fixed footer */
                font-size: 14px;
                line-height: 1.6;
            }

            #result h3 {
                text-align: center;
                font-size: 18px;
                margin-bottom: 20px;
            }

            #result p {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header: This will appear on each printed page -->
    <!-- <div class="doc-header">
        <h1>Dr. Farzana's Diagnostic Centre</h1>
        <h2>Form Details</h2>
    </div> -->

    <!-- Content Section where form details will be printed -->
    <div id="result" class="mt-4">
        <!-- Form data will be inserted here after submission -->
    </div>

    <!-- Footer: This will appear on each printed page -->
    <!-- <div class="footer">
        <p>Contact: Dr. Farzana Diagnostic Centre | Email: dr.farzanalab603@gmail.com | Phone: 0325-6063193</p>
    </div> -->

    <!-- Print Button -->
    <div class="text-center mt-4">
        <button class="btn btn-danger" onclick="printDetails(event)">Print</button>
    </div>

    <script>
        function printDetails(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            const serialNumber = document.querySelector('[name="serial_number"]').value;
            const date = document.querySelector('[name="date"]').value;
            const name = document.querySelector('[name="name"]').value;
            const age = document.querySelector('[name="age"]').value;
            const sex = document.querySelector('[name="sex"]').value;
            const investigation = document.querySelector('[name="investigation"]').value;
            const referredBy = document.querySelector('[name="by"]').value;
            const totalAmount = document.querySelector('[name="T_amount"]').value;
            const advancePayment = document.querySelector('[name="A_payment"]').value;
            const discount = document.querySelector('[name="Discount"]').value;
            const welfare = document.querySelector('[name="Welfare"]').value;
            const balanceDue = document.querySelector('[name="B_due"]').value;
            const receivedBy = document.querySelector('[name="R_by"]').value;

            // Create a result string to display all the details
            let resultHTML = `
                <h3>Form Details</h3>
                <p><strong>Serial Number:</strong> ${serialNumber}</p>
                <p><strong>Date:</strong> ${date}</p>
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Age:</strong> ${age}</p>
                <p><strong>Sex:</strong> ${sex}</p>
                <p><strong>Investigation:</strong> ${investigation}</p>
                <p><strong>Referred By:</strong> ${referredBy}</p>
                <p><strong>Total Amount:</strong> ${totalAmount}</p>
                <p><strong>Advance Payment:</strong> ${advancePayment}</p>
                <p><strong>Discount:</strong> ${discount}</p>
                <p><strong>Welfare:</strong> ${welfare}</p>
                <p><strong>Balance Due:</strong> ${balanceDue}</p>
                <p><strong>Received By:</strong> ${receivedBy}</p>
            `;

            // Display the result in the 'result' div
            document.getElementById('result').innerHTML = resultHTML;

            // Automatically trigger the print dialog
            window.print();
        }
    </script>
</body>
</html>