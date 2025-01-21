<!doctype html>
<html>
  <head>
    
    <title>PHP and Creating Output</title>
    
  </head>
  <body>
  
    <?php echo "<h1>PHP and Creating Output</h1>" ;

    echo "<p>The PHP echo command can be used to create output.</p>";

    echo "<p>When creating output using echo and PHP, quotes can often cause problems. There are several solutions to using quotes within an echo statement:</p>";

    echo "    
    <ul>
        <li>Use HTML special characters</li>
        <li>Alternate between single and double quotes</li>
        <li>Use a backslash to escape quotes</li>
    </ul>"
    ?>
    <h2>More HTML to Convert</h2>

    <p>PHP says "Hello World!"</p>

    <p>Can you display a sentence with ' and "?</p>

    <img src="php-logo.png">

    <?php 
        echo '<img src="php-logo.png">';
        
    ?>

    <img src="<?php echo 'php-logo.png'?>" alt="">

    <?php 
    $fName = "Srivignesh Kavle";
    $lName = "Sathyanarayanan";
    ?>
    <p> My Full Name is: <?php echo $fName." ".$lName ?>
    

  </body>
</html>