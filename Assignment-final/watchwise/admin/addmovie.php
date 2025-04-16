<?php
  include('admin/reusable/conn.php');

  function uploadImage($file) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);
    return $targetFile;
    }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = (int) $_POST['release_year'];  
    $network = $_POST['network'];  
    $cast = $_POST['cast'];  
    $description = $_POST['description'];
    $rating = (float) $_POST['rating'];   

    $imagePath = "";
    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
        $imagePath = mysqli_real_escape_string($connect, $imagePath);
    }

    $query = "INSERT INTO movies (title, genre, release_year, network, cast, description, rating, poster_url) 
          VALUES ('$title', '$genre', '$release_year', '$network', '$cast', '$description', '$rating', '$imagePath')";

    $result = mysqli_query($connect, $query);
    
    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>

</head>

<body>

    <?php
    include 'admin/reusable/nav.php';
    ?>
  
    <?php 
        include 'admin/reusable/conn.php';
        $query = 'SELECT * FROM movies';
        $movies = mysqli_query($connect, $query);
    ?>

    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card add-movie-card">
            <h2 class="text-center">Add Movie</h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger text-center">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>

            <form action="addmovie.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre:</label>
                    <input type="text" name="genre" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="release_year" class="form-label">Released Year:</label>
                    <input type="year" name="release_year" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="network" class="form-label">Streaming Plateform:</label>
                    <input type="text" name="network" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="cast" class="form-label">Cast:</label>
                    <input type="text" name="cast" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <input type="number" name="rating" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image:</label>
                    <input type="file" id="image"  name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary w-50">Add</button>
                    <a href="admin.php" class="btn btn-secondary w-45">Cancel</a>
                </div>
            </form>
        </div>
    </div>

   
</body>
</html>
