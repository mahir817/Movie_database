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

// Handle sorting
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'title';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$genre_filter = isset($_GET['genre']) ? $_GET['genre'] : '';

// Ensure valid columns for sorting
$valid_columns = ['title', 'genre', 'release_year', 'rating'];
if (!in_array($sort_by, $valid_columns)) {
    $sort_by = 'title';
}

// Fetch movies based on genre filter
if ($genre_filter) {
    $sql = "SELECT * FROM movies WHERE genre LIKE '%$genre_filter%' ORDER BY $sort_by $order";
} else {
    $sql = "SELECT * FROM movies ORDER BY $sort_by $order";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movies</title>
    <link rel="stylesheet" href="style2.css">
    <style>
       
        .content {
            padding: 20px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .movie-card {
            background-color: #9aa6b2;
            border: 1px solid #333;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }

        .movie-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
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
    </style>
</head>
<body>
<div class="header">
    <h2>View Movies</h2>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="watchlist.php">Watchlist</a></li>
            <li><a href="add_movie.php">Add Movie</a></li>
            <li><a href="view_movies.php">View Movies</a></li>
            <li><a href="genres.php">Genres</a></li>
            <li><a href="index.php?logout=1" class="logout-link">Logout</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <!-- Genre display -->
    <?php if ($genre_filter): ?>
        <h3>Movies in <?php echo htmlspecialchars($genre_filter); ?> Genre</h3>
    <?php else: ?>
        <h3>All Movies</h3>
    <?php endif; ?>

    <div class="movie-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="movie-card">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p>Genre: <?php echo htmlspecialchars($row['genre']); ?></p>
                    <p>Release Year: <?php echo htmlspecialchars($row['release_year']); ?></p>
                    <p>Rating: <?php echo htmlspecialchars($row['rating']); ?></p>
                    <p><a href="movie_details.php?id=<?php echo $row['id']; ?>">View Details</a></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>
</div>
<?php $conn->close(); ?>
</body>
</html>
