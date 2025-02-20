<?php
 // Connection String -  Always save your connection string in a variable
    // parameters - localhost, username, password, database name (for XAMP - username and password will be root and root)
    $connect = mysqli_connect(
        'localhost','root','','schools'
    );

    if(!$connect){
        die("Connection Falied: " . mysqli_connect_error());
    }
?>