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

  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch the 4 most recently added movies
  $recent_movies_sql = "SELECT * FROM movies ORDER BY id DESC LIMIT 5";
  $recent_movies_result = $conn->query($recent_movies_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinephile - Home</title>
  <link rel="stylesheet" href="style2.css"> 
  <style>
    .recent-movies-section {
      padding: 20px;
    }

    .recent-movies-header {
      margin-bottom: 15px;
      text-align: center;
    }

    .movie-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .movie-card {
      background-color: #BCCCDC;
      border: 1px solid #333;
      border-radius: 5px;
      overflow: hidden;
      text-align: center;
      padding: 10px;
    }

    .movie-card h3 {
      margin: 10px 0;
      font-size: 1.2em;
    }

    .movie-card p {
      margin: 5px 0;
      font-size: 0.9em;
    }

    .movie-card a {
      text-decoration: none;
      color: #e8ebed;
    }

    .movie-card a:hover {
      text-decoration: underline;
    }
  </style>
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
    <li><a href="genres.php">Genres</a></li>
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

    <!-- Recently Added Movies -->
    <div class="recent-movies-section">
      <h2 class="recent-movies-header">Recently Added Movies</h2>
      <div class="movie-grid">
        <?php if ($recent_movies_result->num_rows > 0): ?>
          <?php while ($movie = $recent_movies_result->fetch_assoc()): ?>
            <div class="movie-card">
              <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
              <p>Genre: <?php echo htmlspecialchars($movie['genre']); ?></p>
              <p>Release Year: <?php echo htmlspecialchars($movie['release_year']); ?></p>
              <p>Rating: <?php echo htmlspecialchars($movie['rating']); ?></p>
              <p><a href="movie_details.php?id=<?php echo $movie['id']; ?>">View Details</a></p>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No recently added movies.</p>
        <?php endif; ?>
      </div>
    </div>
  <?php endif ?>
</div>

</body>
</html>
<?php $conn->close(); ?>
