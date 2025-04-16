document.addEventListener("DOMContentLoaded", function () {
    const movieModal = new bootstrap.Modal(document.getElementById("movieModal"));
    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));

    // Handle movie detail display in modal
    document.querySelectorAll(".view-details").forEach(button => {
        button.addEventListener("click", function () {
            document.getElementById("movieTitle").innerText = this.dataset.title;
            document.getElementById("movieImage").src = this.dataset.img;
            document.getElementById("movieDescription").innerText = this.dataset.description;
            document.getElementById("movieGenre").innerText = this.dataset.genre;
            document.getElementById("movieYear").innerText = this.dataset.year;
            document.getElementById("movieNetwork").innerText = this.dataset.network;
            document.getElementById("movieCast").innerText = this.dataset.cast;
            document.getElementById("movieRating").innerText = this.dataset.rating;

            // Fetch Reviews for the movie
            const movieId = this.dataset.id;
            fetch(`fetch_reviews.php?movie_id=${movieId}`)
                .then(response => response.json())
                .then(data => {
                    let reviewsHtml = "";
                    if (data.length > 0) {
                        data.forEach(review => {
                            reviewsHtml += `
                                <div class="review p-2 mb-2 bg-light border rounded">
                                    <strong>${review.user_name}:</strong> ${review.review_text}
                                    <span class="badge bg-primary">${review.rating}/5</span>
                                </div>
                            `;
                        });
                    } else {
                        reviewsHtml = "<p class='text-muted'>No reviews yet.</p>";
                    }
                    document.getElementById("movieReviews").innerHTML = reviewsHtml;
                });

            movieModal.show(); // Show the modal with movie details
        });
    });

    // Handle movie deletion confirmation in modal
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent the default link action

            const movieId = this.dataset.id; // Get movie ID
            const deleteUrl = `admin.php?delete=${movieId}`; // Construct the delete URL

            // Set the URL for the confirmation button
            document.getElementById('deleteConfirmBtn').setAttribute('href', deleteUrl);

            deleteModal.show(); // Show the confirmation modal
        });
    });
});
