<?php 
  include('conn.php');

  // Function to handle image upload
  function uploadImage($file) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
    }

    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile); // Move the file to the target directory
    return $targetFile;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $genre = mysqli_real_escape_string($connect, $_POST['genre']);
    $release_year = (int) $_POST['release_year'];  
    $network = mysqli_real_escape_string($connect, $_POST['network']);  
    $cast = mysqli_real_escape_string($connect, $_POST['cast']);  
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $rating = (float) $_POST['rating'];   

    // Handle the image upload
    $imagePath = "";
    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
        $imagePath = mysqli_real_escape_string($connect, $imagePath); // Sanitize the image path
    }

    // Construct the SQL query
    $query = "INSERT INTO movies (title, genre, release_year, network, cast, description, rating, poster_url) 
              VALUES ('$title', '$genre', '$release_year', '$network', '$cast', '$description', '$rating', '$imagePath')";

    // Execute the query
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        // Redirect to admin page upon success
        header("Location: admin.php");
        exit();
    } else {
        // Display error message if query fails
        echo "Failed: " . mysqli_error($connect);
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Add Movie</title>

</head>

<body>

    <?php
    include 'nav.php';
    ?>
  
    <?php 
        include 'conn.php';
        $query = 'SELECT * FROM movies';
        $movies = mysqli_query($connect, $query);
    ?>



<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="card p-4 shadow-lg" style="max-width: 600px; width: 100%; border-radius: 15px;">
        <h1 class="text-center mb-4 font-weight-bold text-dark display-4">Add Movie</h1>

        <!-- Error Message Display -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <form action="addmovie.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label font-weight-bold ">Title:</label>
                <input type="text" name="title" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label font-weight-bold ">Genre:</label>
                <input type="text" name="genre" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="release_year" class="form-label font-weight-bold ">Released Year:</label>
                <input type="number" name="release_year" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="network" class="form-label font-weight-bold ">Streaming Platform:</label>
                <input type="text" name="network" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="cast" class="form-label font-weight-bold ">Cast:</label>
                <input type="text" name="cast" class="form-control form-control-lg" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label font-weight-bold ">Description:</label>
                <textarea name="description" class="form-control form-control-lg" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label font-weight-bold ">Rating:</label>
                <input type="number" name="rating" class="form-control form-control-lg" step="0.1" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label font-weight-bold ">Upload Image:</label>
                <input type="file" id="image" name="image" class="form-control form-control-lg">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success w-48">Add</button>
                <a href="admin.php" class="btn btn-danger w-48">Cancel</a>
            </div>
        </form>
    </div>
</div>




    
    <!-- jQuery (required for Bootstrap 5 in certain cases) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Popper.js (needed for Bootstrap tooltips and popovers) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Your custom script -->
<script src="scripts/script.js"></script>
</body>
</html>
