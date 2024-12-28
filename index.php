<?php 
  session_start(); 

  // Redirect to login if not logged in
  if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
  }

  // Handle logout action
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinephile - Home</title>
  <link rel="stylesheet" href="style2.css"> 
</head>
<body>

<div class="header">
  <h2>Cinephile - Your Movie Hub</h2>
  <div class="navbar">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="watchlist.php">Watchlist</a></li>
      <li><a href="add_movie.php">Add Movie</a></li>
      <li><a href="view_movies.php">View Movies</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="index.php?logout=1" class="logout-link">Logout</a></li>
    </ul>
    <form class="search-form" method="get" action="search.php">
      <input type="text" name="query" placeholder="Search movies...">
      <button type="submit">Search</button>
    </form>
  </div>
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
  <?php if (isset($_SESSION['username'])) : ?>
    <div class="welcome-message">
      <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p>Explore movies, TV shows, and more on Cinephile!</p>
    </div>

    <div class="movie-categories">
      <!-- Add links to each category with genre parameters -->
      <div class="movie-category">
        <a href="view_movies.php?genre=Action">
          <h3>Action</h3>
        </a>
        <p>Bond! James Bond</p>
      </div>
      <div class="movie-category">
        <a href="view_movies.php?genre=Comedy">
          <h3>Comedy</h3>
        </a>
        <p>Can I interest you in a sarcastic comment?</p>
      </div>
      <div class="movie-category">
        <a href="view_movies.php?genre=Drama">
          <h3>Drama</h3>
        </a>
        <p>The first rule of fight club is ...</p>
      </div>
      <div class="movie-category">
        <a href="view_movies.php?genre=Romance">
          <h3>Romance</h3>
        </a>
        <p>I'd rather die tomorrow than live a hundred years without knowing you.</p>
      </div>
    </div>
  <?php endif ?>
</div>

</body>
</html>
