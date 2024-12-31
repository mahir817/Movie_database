<?php
// Start the session and include database connection
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define fixed genres
$fixed_genres = [
    "Action",
    "Comedy",
    "Drama",
    "Thriller",
    "Satire",
    "Romance",
    "Horror",
    "Fantasy",
    "Crime",
    "Music",
    "Sports",
    "Biography",
    "Animation",
    "Mystery",
    "Sci-Fi"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="style2.css">
    <script>
        function navigateToGenre() {
            const genre = document.getElementById("genre-select").value;
            if (genre) {
                window.location.href = "view_movies.php?genre=" + encodeURIComponent(genre);
            }
        }
    </script>
</head>
<body>
<div class="header">
    <h2>Genres</h2>
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
    <h3>Select a Genre</h3>
    <div class="genre-dropdown">
        <label for="genre-select">Genres:</label>
        <select id="genre-select" onchange="navigateToGenre()">
            <option value="">Select a Genre</option>
            <?php foreach ($fixed_genres as $genre): ?>
                <option value="<?php echo htmlspecialchars($genre); ?>">
                    <?php echo htmlspecialchars($genre); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
</body>
</html>
<?php $conn->close(); ?>
