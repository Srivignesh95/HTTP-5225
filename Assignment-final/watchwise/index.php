<?php

include('functions.php');
?>
<?php
include 'conn.php';
// Fetch all movies from the database
$query = "SELECT * FROM movies";
$movies = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>

<!-- Login Button -->
<a class="btn btn-primary" href="login.php" role="button" style="display: flex; justify-content: center;">Login to Manage your Favourite Movies</a>
<br><br>
<!-- Register Button -->
<div class="container text-center my-4">
    <a class="btn btn-secondary" href="register.php" role="button">Register to Create an Account</a>
</div>

<!-- Movie List -->
<div class="container mt-4">
    <h1 class="text-center">WatchWise</h1>
    
    <div class="row">
        <?php foreach ($movies as $movie): ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card movie-card">
                <div class="card-header text-center">
                    <h5><?= htmlspecialchars($movie['title']) ?></h5>
                </div>
                <div class="card-body movie-body">
                    <img src="images/<?= htmlspecialchars($movie['poster_url']) ?>" class="movie-img" alt="Movie Poster">
                    <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                    <p><strong>Release Year:</strong> <?= htmlspecialchars($movie['release_year']) ?></p>
                    <p><strong>Rating:</strong> <?= htmlspecialchars($movie['rating']) ?>/10</p>
                    <button class="btn btn-primary btn-sm view-details" 
        data-id="<?= $movie['id'] ?>" 
        data-title="<?= htmlspecialchars($movie['title']) ?>" 
        data-genre="<?= htmlspecialchars($movie['genre']) ?>" 
        data-year="<?= $movie['release_year'] ?>" 
        data-network="<?= htmlspecialchars($movie['network']) ?>" 
        data-cast="<?= htmlspecialchars($movie['cast']) ?>" 
        data-rating="<?= $movie['rating'] ?>" 
        data-img="images/<?= htmlspecialchars($movie['poster_url']) ?>"
        data-description="<?= htmlspecialchars($movie['description']) ?>"
        data-bs-toggle="modal" data-bs-target="#movieModal">View Details</button>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3 id="movieTitle"></h3>
                    <img id="movieImage" class="img-fluid mb-3" />
                    <p id="movieDescription"></p>
                    <p><strong>Genre:</strong> <span id="movieGenre"></span></p>
                    <p><strong>Release Year:</strong> <span id="movieYear"></span></p>
                    <p><strong>Network:</strong> <span id="movieNetwork"></span></p>
                    <p><strong>Cast:</strong> <span id="movieCast"></span></p>
                    <p><strong>Rating:</strong> <span id="movieRating"></span>/10</p>

                    <hr>
                    <h5>Reviews</h5>
                    <div id="movieReviews" class="text-start"></div>
                </div>
            </div>
        </div>
    </div>

 <!-- Bootstrap JS and dependencies -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom script for handling modal and deletion -->
    <script src="scripts/script.js"></script>

</body>
</html>
