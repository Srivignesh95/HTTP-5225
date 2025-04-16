<?php
include('conn.php');

function uploadImage($file) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $targetFile);
    return $targetFile;
}

// Check if movie ID is set
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$movie_id = (int) $_GET['id'];

// Fetch movie details
$query = "SELECT * FROM movies WHERE id = $movie_id";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Movie not found.";
    exit();
}

$movie = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs using mysqli_real_escape_string
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $genre = mysqli_real_escape_string($connect, $_POST['genre']);
    $release_year = (int) $_POST['release_year'];  
    $network = mysqli_real_escape_string($connect, $_POST['network']);  
    $cast = mysqli_real_escape_string($connect, $_POST['cast']);  
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $rating = (float) $_POST['rating'];   

    // Handle image upload if a new image is selected
    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
        $imagePath = mysqli_real_escape_string($connect, $imagePath); // Escape the image path
        $query = "UPDATE movies SET title='$title', genre='$genre', release_year='$release_year', 
                  network='$network', cast='$cast', description='$description', rating='$rating', 
                  poster_url='$imagePath' WHERE id='$movie_id'";
    } else {
        $query = "UPDATE movies SET title='$title', genre='$genre', release_year='$release_year', 
                  network='$network', cast='$cast', description='$description', rating='$rating'
                  WHERE id='$movie_id'";
    }

    // Execute the update query
    $updateResult = mysqli_query($connect, $query);

    if ($updateResult) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Failed to update: " . mysqli_error($connect);
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

    <?php include 'nav.php'; ?>

    <title>Edit Movie</title>
</head>

<body>

<div class="container my-5">
    <div class="card p-4 shadow-lg" style="max-width: 600px; width: 100%; border-radius: 15px;">
        <h1 class="text-center mb-4 font-weight-bold text-dark display-4">Edit Movie</h1> <!-- Bold, black, and bigger title -->

        <form action="editmovie.php?id=<?= $movie_id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label font-weight-bold ">Title:</label>
                <input type="text" name="title" class="form-control form-control-lg" value="<?= htmlspecialchars($movie['title']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label font-weight-bold ">Genre:</label>
                <input type="text" name="genre" class="form-control form-control-lg" value="<?= htmlspecialchars($movie['genre']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="release_year" class="form-label font-weight-bold ">Released Year:</label>
                <input type="number" name="release_year" class="form-control form-control-lg" value="<?= $movie['release_year'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="network" class="form-label font-weight-bold ">Streaming Platform:</label>
                <input type="text" name="network" class="form-control form-control-lg" value="<?= htmlspecialchars($movie['network']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="cast" class="form-label font-weight-bold ">Cast:</label>
                <input type="text" name="cast" class="form-control form-control-lg" value="<?= htmlspecialchars($movie['cast']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label font-weight-bold ">Description:</label>
                <textarea name="description" class="form-control form-control-lg" rows="4" required><?= htmlspecialchars($movie['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label font-weight-bold ">Rating:</label>
                <input type="number" step="0.1" name="rating" class="form-control form-control-lg" value="<?= $movie['rating'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label font-weight-bold ">Current Poster:</label><br>
                <img src="<?= $movie['poster_url'] ?>" alt="Movie Poster" width="150">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label font-weight-bold ">Upload New Image (optional):</label>
                <input type="file" id="image" name="image" class="form-control form-control-lg">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success w-48">Update</button>
                <a href="admin.php" class="btn btn-danger w-48">Cancel</a>
            </div>
        </form>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/script.js"></script>

</body>
</html>
