<?php
include 'reusables/connection.php';

if (isset($_GET['movie_id'])) {
    $movie_id = intval($_GET['movie_id']);
    $query = "SELECT user_name, review_text, rating FROM reviews WHERE movie_id = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    echo json_encode($reviews);
}
?>
