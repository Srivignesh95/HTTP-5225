<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In-Class Lab</title>
</head>
<body>
    <h2> Welcome to the Quirky Zoo Management System! </h2>
    <?php 
        $hour = ceil(rand(1,24));
        if($hour>=5 && $hour<=9){
            echo '<p> Bananas, Apples, and Oats </p>';
        }
        elseif($hour>=12 && $hour<=14){
            echo '<p> Fish, Chicken, and Vegetables </p>';
        }
        elseif($hour>=19 && $hour<=21){
            echo '<p> Steak, Carrots, and Broccoli </p>';
        }
        else{
            echo '<p>  The animals are not being fed. </p>';
        }
    ?>
    <h2> PHP Control Structures - The Magic Number Game </h2>
    <?php
        $ranNumber = ceil(rand(1,24));
    if($ranNumber%3==0 && $ranNumber%5!=0){ 
        echo'<p> The number is:'.$ranNumber.' </p>';
        echo '<p> Fizz </p>';
    }
    elseif($ranNumber%5==0 && $ranNumber%3!=0){ 
        echo'<p> The number is:'.$ranNumber.' </p>';
        echo '<p> Buzz </p>';
    }
    elseif($ranNumber%3==0 && $ranNumber%5==0){
        echo'<p> The number is:'.$ranNumber.' </p>';
        echo '<p> FizBuzz </p>';
    }
    else{
        echo'<p> The number is:'.$ranNumber.' </p>';
    }

    ?>

</body>
</html>