<?php
  function get_random_reel() {
    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=instagram', 'root', '');

    // Get a random reel from the database
    $sql = 'SELECT * FROM reels ORDER BY RAND() LIMIT 1';
    $statement = $db->prepare($sql);
    $statement->execute();
    $reel = $statement->fetch();

    return $reel;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Instagram Reels</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="reels">
      <?php
        // Get a random reel from the database
        $reel = get_random_reel();

        // Display the reel
        echo '<div class="reel-container">';
        echo '<img src="' . $reel['image_url'] . '" alt="' . $reel['title'] . '">';
        echo '<div class="reel-info">';
        echo '<h3>' . $reel['title'] . '</h3>';
        echo '<p>' . $reel['description'] . '</p>';
        echo '</div>';
        echo '</div>';
      ?>
    </div>
  </div>
</body>
</html>