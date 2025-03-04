<?php
require 'includes/header.php';
require 'includes/conn.php';
?>
<div class="container">
    <h1 class="heading">Top Restaurants in Kitchener/Waterloo</h1>
    <div class="grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<img src='./includes/images/" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
                echo "<div class='info'>";
                echo "<p class='name'>" . $row['name'] . "</p>";
                echo "<p class='rating'>" . $row['rating'] . "</p>";
                echo "<p class='price'>Price: " . $row['price_range'] . "</p>";
                echo "<p class='address'>" . $row['address'] . "</p>";
                echo "<p>Cuisine: " . $row['cuisine'] . "</p>";
                echo "</div></div>";
            }
        } else {
            echo "<p>No restaurants found.</p>";
        }
        ?>
    </div>
</div>
<?php
require 'includes/footer.php';
?>