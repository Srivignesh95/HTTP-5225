<?php
$connect = mysqli_connect('localhost', 'root', '','watchwise');
if(!$connect)
{
    echo 'error: ' .mysqli_connect_error();
    exit;
}
?>