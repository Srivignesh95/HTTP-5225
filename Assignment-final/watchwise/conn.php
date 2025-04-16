<?php
  $connect = mysqli_connect('localhost', 'root', '', 'movies');
  
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }
