<?php
require '../includes/header.php';
require '../includes/conn.php';
require("functions.php");
?>
<div class="container mt-3">
    
    <div class="row mt-4">
        <div class="col-lg-3 mb-3">
            <div class="card bg-light shadow">
                <div class="card-header fw-bold">Registered Users</div>
                <div class="card-body text-center">
                    <p class="card-text">No. total Users: <?php echo restaurant_count();?></p>
                    <a class="btn btn-danger w-100" href="Regusers.php" target="_blank">View Registered Users</a>
                </div>
            </div>
        </div>
</div>
<?php
require '../includes/footer.php';
?>