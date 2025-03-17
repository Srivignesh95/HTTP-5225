<?php
require 'includes/conn.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include 'includes/header.php';

if (!isset($_SESSION['role'])) {
    header("Location: " . $baseURL . "/login.php");
    exit();
}

 if ($_SESSION['role'] === 'admin') {
     header("Location: " . $baseURL . "/admin/index.php");
     exit();
} 


include 'includes/footer.php';
?>
