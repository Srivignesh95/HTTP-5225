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
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = (int) $_POST['release_year'];  
    $network = $_POST['network'];  
    $cast = $_POST['cast'];  
    $description = $_POST['description'];
    $rating = (float) $_POST['rating'];   

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $imagePath = uploadImage($_FILES['image']);
        $imagePath = mysqli_real_escape_string($connect, $imagePath);
        $query = "UPDATE movies SET title='$title', genre='$genre', release_year='$release_year', 
                  network='$network', cast='$cast', description='$description', rating='$rating', 
                  poster_url='$imagePath' WHERE id='$movie_id'";
    } else {
        $query = "UPDATE movies SET title='$title', genre='$genre', release_year='$release_year', 
                  network='$network', cast='$cast', description='$description', rating='$rating'
                  WHERE id='$movie_id'";
    }

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
    <title>Edit Movie</title>
</head>

<body>

    <?php include 'admin/reusable/nav.php'; ?>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="card add-movie-card">
            <h2 class="text-center">Edit Movie</h2>

            <form action="editmovie.php?id=<?= $movie_id ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($movie['title']) ?>">
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre:</label>
                    <input type="text" name="genre" class="form-control" value="<?= htmlspecialchars($movie['genre']) ?>">
                </div>

                <div class="mb-3">
                    <label for="release_year" class="form-label">Released Year:</label>
                    <input type="number" name="release_year" class="form-control" value="<?= $movie['release_year'] ?>">
                </div>

                <div class="mb-3">
                    <label for="network" class="form-label">Streaming Platform:</label>
                    <input type="text" name="network" class="form-control" value="<?= htmlspecialchars($movie['network']) ?>">
                </div>

                <div class="mb-3">
                    <label for="cast" class="form-label">Cast:</label>
                    <input type="text" name="cast" class="form-control" value="<?= htmlspecialchars($movie['cast']) ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control"><?= htmlspecialchars($movie['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <input type="number" step="0.1" name="rating" class="form-control" value="<?= $movie['rating'] ?>">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Current Poster:</label><br>
                    <img src="<?= $movie['poster_url'] ?>" alt="Movie Poster" width="150">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image (optional):</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary w-50">Update</button>
                    <a href="admin.php" class="btn btn-secondary w-45">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
