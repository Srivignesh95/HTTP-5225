<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$baseURL = "http://localhost/HTTP-5225/Assignmnent-2";
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Library Management System (LMS)</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
                       
            <?php if(isset($_SESSION['role'])): ?>
                    <!-- Show Logout if session is active -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseURL; ?>logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <!-- Show Login if no session -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseURL; ?>login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseURL; ?>register.php">Register</a>
                    </li>
                <?php endif; ?>
        </ul>
    </div>
</nav>