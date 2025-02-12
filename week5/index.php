<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week5 | SQL Connection</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "colors";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM colors";
    $colors = mysqli_query($conn, $query);

    //echo '<pre>'. print_r($colors). '</pre>';   
	echo '<h1> Week 5 - In Class Assignment </h1>';
    while ($row = mysqli_fetch_assoc($colors)) {
		$Name = $row['Name'];
		$HexCode = $row['Hex'];
		echo "<div class='color-block' style='background-color: $HexCode;padding:15px;'>$Name</div>";
	}
    ?>
</body>
</html>