<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4 | in-class</title>
</head>
<body>
    <?php
    // Function to fetch user data from the JSONPlaceholder API
    function getUsers() {
        $url = "https://jsonplaceholder.typicode.com/users";
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
    // Get the list of users
    $users = getUsers();

    echo "<h2>List of Users</h2>";
    
    for ($i = 0; $i < count($users); $i++) {
        echo "<b>User:</b>" .$i+1 . "<br>";
        echo "<b>Name:</b> " . $users[$i]['name'] . "<br>";
        echo "<b>Username:</b> " . $users[$i]['username'] . "<br>";
        echo "<b>Email:</b> <a href='mailto:" . $users[$i]['email'] ."'>" . $users[$i]['email'] . "</a><br>";
        echo "<b>Address:</b> " . $users[$i]['address']['suite'] . ",<br> " 
                                . $users[$i]['address']['street'] . ",<br>" 
                                . $users[$i]['address']['city'] . ", " 
                                . $users[$i]['address']['zipcode'] . "<br>";
        echo "<hr>";
    }
    ?>
</body>
</html>