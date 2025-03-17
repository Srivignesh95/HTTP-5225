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
    <div class="row mt-4">
        <div class="col-lg-3 mb-3">
            <div class="card bg-light">
                <div class="card-header">Registered Users</div>
                <div class="card-body">
                    <p class="card-text">No. total Users: <?php echo get_user_count();?></p>
                    <a class="btn btn-danger" href="Regusers.php" target="_blank">View Registered Users</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card bg-light">
                <div class="card-header">Total Books</div>
                <div class="card-body">
                    <p class="card-text">No. of books available: <?php echo get_book_count();?></p>
                    <a class="btn btn-success" href="Regbooks.php" target="_blank">View All Books</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card bg-light">
                <div class="card-header">Book Categories</div>
                <div class="card-body">
                    <p class="card-text">No. of Book Categories: <?php echo get_category_count();?></p>
                    <a class="btn btn-warning" href="Regcat.php" target="_blank">View Categories</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card bg-light">
                <div class="card-header">Number of Authors</div>
                <div class="card-body">
                    <p class="card-text">No. of Authors: <?php echo get_author_count();?></p>
                    <a class="btn btn-primary" href="Regauthor.php" target="_blank">View Authors</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-lg-3 mb-3">
            <div class="card bg-light">
                <div class="card-header">Books Issued</div>
                <div class="card-body">
                    <p class="card-text">No. of books issued: <?php echo get_issue_book_count();?></p>
                    <a class="btn btn-success" href="view_issued_book.php" target="_blank">View Issued Books</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include '../includes/footer.php'
?>