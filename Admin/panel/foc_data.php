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
$query = "SELECT * FROM `foc_data` WHERE status = '1' 
          AND (name LIKE ? OR investigation LIKE ?)
          ORDER BY id DESC LIMIT ?, ?";
$stmt = mysqli_prepare($connection, $query);

// Bind parameters for prepared statement
$searchTerm = "%$search%";
mysqli_stmt_bind_param($stmt, 'sssi', $searchTerm, $searchTerm, $offset, $limit);

// Execute the query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
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
                <h2>Foc Data</h2>
                
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
                        <th scope="col">Age</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Investigation</th>
                        <th scope="col">Refered By</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['sex']; ?></td>
                            <td><?php echo $row['investigation']; ?></td>
                            <td><?php echo $row['refered_by']; ?></td>
                            <td><a href="updatedata.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

<?php
// Pagination logic
$fetchpage = "SELECT * FROM `foc_data` WHERE status = '1'";
$query = mysqli_query($connection, $fetchpage);

if(mysqli_num_rows($query) > 0){
    $totalRecords = mysqli_num_rows($query);
    $totalpages = ceil($totalRecords / $limit);
    echo '<ul class="pagination">';
    if($getpgno > 1){
        echo '<li class="page-item"><a class="page-link" href="foc_data.php?page='.($getpgno - 1).'">prev</a></li>';
    }
    for($i = 1; $i <= $totalpages; $i++){
        $active = $i == $getpgno ? "active" : "";
        echo '<li class="'.$active.' page-item"><a class="page-link" href="foc_data.php?page='.$i.'">'.$i.'</a></li>';
    }
    if($getpgno < $totalpages){
        echo '<li class="page-item"><a class="page-link" href="foc_data.php?page='.($getpgno + 1).'">next</a></li>';
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