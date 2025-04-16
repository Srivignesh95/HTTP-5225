document.addEventListener("DOMContentLoaded", function () {
    const movieModalElement = document.getElementById("movieModal");
    const deleteModalElement = document.getElementById("deleteModal");

    // Initialize modals only if they exist in the DOM
    const movieModal = movieModalElement ? new bootstrap.Modal(movieModalElement) : null;
    const deleteModal = deleteModalElement ? new bootstrap.Modal(deleteModalElement) : null;

    // View Details Button Event
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

            // Fetch and display reviews
            fetch(`fetch_reviews.php?movie_id=${this.dataset.id}`)
                .then(response => response.json())
                .then(data => {
                    let reviewsHtml = data.length ? data.map(review =>
                        `<div class="review p-2 mb-2 bg-light border rounded">
                            <strong>${review.user_name}:</strong> ${review.review_text}
                            <span class="badge bg-primary">${review.rating}/5</span>
                        </div>`
                    ).join('') : "<p class='text-muted'>No reviews yet.</p>";
                    document.getElementById("movieReviews").innerHTML = reviewsHtml;
                });

            movieModal?.show(); // Show the movie modal
        });
    });

    // Delete Button Event
    if (deleteModal) {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent default link action
                const movieId = this.dataset.id;
                document.getElementById("deleteConfirmBtn").dataset.movieId = movieId;  // Set movie ID in delete confirm button
                deleteModal.show();  // Show the delete confirmation modal
            });
        });

        // Confirm Delete Event
        const deleteConfirmBtn = document.getElementById("deleteConfirmBtn");
        if (deleteConfirmBtn) {
            deleteConfirmBtn.addEventListener('click', function () {
                const movieId = this.dataset.movieId;
                if (movieId) {
                    const params = new URLSearchParams();
                    params.append('id', movieId);

                    fetch('deletemovie.php', {
                        method: 'POST',
                        body: params
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();  // Refresh the page after successful deletion
                        } else {
                            console.error('Failed to delete movie');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        }
    }
});
