<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinephile - Home</title>
  <link rel="stylesheet" href="style2.css"> <!-- Link to style2.css -->
</head>
<body>

<div class="header">
  <h2>Cinephile - Your Movie Hub</h2>
</div>

<div class="content">
  <!-- Notification message -->
  <?php if (isset($_SESSION['success'])) : ?>
    <div class="error success">
      <h3>
        <?php 
          echo $_SESSION['success']; 
          unset($_SESSION['success']);
        ?>
      </h3>
    </div>
  <?php endif ?>

  <!-- Logged-in user information -->
  <?php  if (isset($_SESSION['username'])) : ?>
    <div class="welcome-message">
      <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p>Explore movies, TV shows, and more on Cinephile!</p>
    </div>

    <div class="movie-categories">
      <div class="movie-category">
        <h3>Action</h3>
        <p>Explore action-packed movies</p>
      </div>
      <div class="movie-category">
        <h3>Comedy</h3>
        <p>Laughter guaranteed with these movies</p>
      </div>
      <div class="movie-category">
        <h3>Drama</h3>
        <p>Experience emotional stories</p>
      </div>
      <div class="movie-category">
        <h3>Romance</h3>
        <p>Fall in love with these movies</p>
      </div>
    </div>

    <p><a href="index.php?logout='1'" class="logout-btn">Logout</a></p>
  <?php endif ?>
</div>

</body>
</html>
