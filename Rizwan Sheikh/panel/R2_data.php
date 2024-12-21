<?php
include("admin/includes/header1.php");
include("admin/includes/header.php");
include("admin/includes/sidebar.php");
include("admin/includes/topbar.php");
include('../config.php');

$limit = 10;
$getpgno = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($getpgno - 1) * $limit;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepared statement to prevent SQL injection
$query = "SELECT * FROM `form_data` WHERE received_by = 'Rizwan Sheikh' AND status = '1' 
          AND (name LIKE ? OR investigation LIKE ? OR total_amount LIKE ?)
          ORDER BY id DESC LIMIT ?, ?";
$stmt = mysqli_prepare($connection, $query);

// Bind parameters for prepared statement
$searchTerm = "%$search%";
mysqli_stmt_bind_param($stmt, 'ssssi', $searchTerm, $searchTerm, $searchTerm, $offset, $limit);

// Execute the query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Initialize totals
$totalAmount = 0;
$advancePayment = 0;
$balanceDue = 0;
$discount = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-left">
      
            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Received By Rizwan Sheikh</h2>
                
                <form method="get" action="">
                  <input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">
                  <button type="submit">Search</button>
                </form>
                <hr>
                <table class="table table-secondary">
                    <thead class="bg-secondary p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Investigation</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Advance Payment</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Balance Due</th>
                        <th scope="col">Received By</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            // Add up the totals
                            $totalAmount += $row['total_amount'];
                            $advancePayment += $row['advance_payment'];
                            $balanceDue += $row['balance_due'];
                            $discount += $row['discount'];
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['investigation']; ?></td>
                            <td><?php echo $row['total_amount']; ?></td>
                            <td><?php echo $row['advance_payment']; ?></td>
                            <td><?php echo $row['discount']; ?></td>
                            <td><?php echo $row['balance_due']; ?></td>
                            <td><?php echo $row['received_by']; ?></td>
                            <td><a href="updatedata.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                            <td><a href="del.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong><?php echo number_format($totalAmount); ?></strong></td>
                            <td><strong><?php echo number_format($advancePayment); ?></strong></td>
                            <td><strong><?php echo number_format($discount); ?></strong></td>
                            <td><strong><?php echo number_format($balanceDue); ?></strong></td>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>

<?php
// Pagination logic
$fetchpage = "SELECT * FROM `form_data` WHERE status = '1' OR received_by = 'Rizwan Sheikh'";
$query = mysqli_query($connection, $fetchpage);

if(mysqli_num_rows($query) > 0){
    $totalRecords = mysqli_num_rows($query);
    $totalpages = ceil($totalRecords / $limit);
    echo '<ul class="pagination">';
    if($getpgno > 1){
        echo '<li class="page-item"><a class="page-link" href="R2_data.php?page='.($getpgno - 1).'">prev</a></li>';
    }
    for($i = 1; $i <= $totalpages; $i++){
        $active = $i == $getpgno ? "active" : "";
        echo '<li class="'.$active.' page-item"><a class="page-link" href="R2_data.php?page='.$i.'">'.$i.'</a></li>';
    }
    if($getpgno < $totalpages){
        echo '<li class="page-item"><a class="page-link" href="R2_data.php?page='.($getpgno + 1).'">next</a></li>';
    }
    echo '</ul>';
}
?>

            </div>
        </div>
    </div>

</body>
</html>

<?php
include('admin/includes/footer.php');
?>