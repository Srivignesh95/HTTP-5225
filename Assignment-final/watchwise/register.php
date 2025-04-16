<?php
include('conn.php');
include('functions.php');

// Handle registration logic
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Encrypt password

    // Check if the email already exists
    $query = 'SELECT * FROM users WHERE email = "' . $email . '" LIMIT 1';
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        set_message('Email already exists!', 'danger');
        header('Location: register.php');
        die();
    }

    // Insert new user into the database
    $insert_query = 'INSERT INTO users (name, email, password) 
                     VALUES ("' . $name . '", "' . $email . '", "' . $password . '")';
    if (mysqli_query($connect, $insert_query)) {
        set_message('Registration successful! You can now log in.', 'success');
    } else {
        set_message('Something went wrong. Please try again.', 'danger');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | WatchWise</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h3 class="mt-5 mb-5">Register</h3>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php get_message(); ?>  <!-- Show success or error messages -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 offset-md-4 mt-5">
        <form method="POST" action="register.php">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
        <br>
        <a href="login.php" class="btn btn-secondary">Already have an account? Login</a> <!-- Redirect to login page -->
      </div>
    </div>
  </div>
</body>
</html>
