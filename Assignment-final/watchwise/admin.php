<?php  
  include('functions.php');
  secure(); // Check if user is logged in
?>

<?php
include('conn.php');

// Fetch all movies from the database
$query = "SELECT * FROM movies";
$movies = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>

    <?php include 'nav.php'; ?> <!-- Navigation bar -->

    <div class="container mt-4">
        <h2 class="text-center mb-4">Movie List</h2>
        <a href="addmovie.php" class="btn btn-primary mb-3">Add Movie</a>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Poster</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Release Year</th>
                    <th>Network</th>
                    <th>Cast</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($movie = mysqli_fetch_assoc($movies)) : ?>
                    <tr>
                        <td><?= $movie['id'] ?></td>
                        <td><img src="images/<?= htmlspecialchars($movie['poster_url']) ?>" alt="Poster" width="75" class="img-fluid"></td>
                        <td><?= htmlspecialchars($movie['title']) ?></td>
                        <td><?= htmlspecialchars($movie['genre']) ?></td>
                        <td><?= $movie['release_year'] ?></td>
                        <td><?= htmlspecialchars($movie['network']) ?></td>
                        <td><?= htmlspecialchars($movie['cast']) ?></td>
                        <td><?= $movie['rating'] ?></td>
                        <td>
                            <a href="editmovie.php?id=<?= $movie['id'] ?>" class="btn btn-warning btn-sm">Edit Movie</a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $movie['id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Movie</button>
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
                        </td>                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Movie Details Modal -->
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

    <!-- Deletion Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this movie?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="deleteConfirmBtn" class="btn btn-danger" href="#">Delete Movie</a>
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
