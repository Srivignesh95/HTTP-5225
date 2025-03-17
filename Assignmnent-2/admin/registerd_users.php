<?php 
    include '../includes/functions.php';
    include '../includes/header.php';

    if (!isset($_SESSION['role'])) {
        header("Location: " . $baseURL . "/login.php");
        exit();
    }

    if ($_SESSION['role'] !== 'admin') {
        header("Location: " . $baseURL . "/index.php");
        exit();
    }
    
?>
<div class="container mt-3">
    <div class="alert alert-info text-center" role="alert">
        <strong>Library Management System:</strong> Library opens at 8:00 AM and closes at 11:00 PM
    </div>
    <h4 class="text-center mb-4">Registered Users Detail</h4>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "select * from users";
                            $query_run = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $name = htmlspecialchars($row['name']);
                                $email = htmlspecialchars($row['email']);
                                $mobile = htmlspecialchars($row['mobile']);
                                $address = htmlspecialchars($row['address']);
                        ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $address; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    include '../includes/footer.php'
?>