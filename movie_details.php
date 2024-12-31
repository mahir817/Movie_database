<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Validate the ID as an integer

    // Fetch movie details
    $sql = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        echo "Movie not found.";
        exit;
    }
} else {
    echo "No movie ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?> - Details</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="header">
    <h2>Movie Details</h2>
     <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="watchlist.php">Watchlist</a></li>
            <li><a href="add_movie.php">Add Movie</a></li>
            <li><a href="view_movies.php">View Movies</a></li>
            <li><a href="genres.php" class="active">Genres</a></li>
            
            <li><a href="index.php?logout=1" class="logout-link">Logout</a></li>
        </ul>
    </div>
</div>

<div class="content">
    <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
    <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></p>
    <p><strong>Release Year:</strong> <?php echo htmlspecialchars($movie['release_year']); ?></p>
    <p><strong>Rating:</strong> <?php echo htmlspecialchars($movie['rating']); ?> ★</p>
    <p><strong>Runtime:</strong> <?php echo htmlspecialchars($movie['runtime']); ?> minutes</p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($movie['description']); ?></p>
    <a href="view_movies.php" class="back-button">Back to Movies</a>
</div>

<?php $conn->close(); ?>
</body>
</html>