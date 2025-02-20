<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 7 - In class Lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    include('include/header.php');
    ?>
    <?php
    include('include/connect.php');
    $query = 'SELECT * FROM schools';
    $schools = mysqli_query($connect,$query);

    foreach($schools as $school){
      echo '<ul class="list-group">
        <li class="list-group-item"><strong>Board:</strong> ' . $school['Board'] . '</li>
        <li class="list-group-item"><strong>School Type:</strong> <span class="badge bg-primary">' . $school['School Type'] . '</span></li>
        <li class="list-group-item"><strong>Language:</strong> <span class="badge bg-success">' . $school['Language'] . '</span></li>
      </ul>';

    }
    ?>

</body>
</html>