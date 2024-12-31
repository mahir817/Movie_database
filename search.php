<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize search and filter parameters
$query = isset($_GET['query']) ? $_GET['query'] : "";
$filter_genre = isset($_GET['filter_genre']) ? $_GET['filter_genre'] : "";
$release_year = isset($_GET['release_year']) ? $_GET['release_year'] : "";
$rating_min = isset($_GET['rating_min']) ? $_GET['rating_min'] : "";
$rating_max = isset($_GET['rating_max']) ? $_GET['rating_max'] : "";

// Construct SQL query
$sql = "SELECT * FROM movies WHERE 1=1";

// Search by title, genre, or director
if (!empty($query)) {
    $sql .= " AND (title LIKE '%$query%' OR genre LIKE '%$query%' OR director LIKE '%$query%')";
}

// Filter by genre
if (!empty($filter_genre)) {
    $sql .= " AND genre LIKE '%$filter_genre%'";
}

// Filter by release year
if (!empty($release_year)) {
    $sql .= " AND release_year = '$release_year'";
}

// Filter by rating range
if (!empty($rating_min) && !empty($rating_max)) {
    $sql .= " AND rating BETWEEN $rating_min AND $rating_max";
}

// Execute query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
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
    <h2>Search Movies</h2>
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
    <form method="get" action="search.php" class="search-form">
        <input type="text" name="query" placeholder="Search by title, genre, or director" value="<?php echo htmlspecialchars($query); ?>">
        <button type="submit">Search</button>
    </form>

    <form method="get" action="search.php" class="filter-form">
        <label for="filter_genre">Genre:</label>
        <select name="filter_genre" id="filter_genre">
            <option value="">All Genres</option>
            <?php
            $genres = ["Action", "Comedy", "Drama", "Thriller", "Satire", "Romance", "Horror", "Fantasy", "Crime", "Musical", "Mystery"];
            foreach ($genres as $genre) {
                $selected = $genre === $filter_genre ? "selected" : "";
                echo "<option value='$genre' $selected>$genre</option>";
            }
            ?>
        </select>

        <label for="release_year">Release Year:</label>
        <input type="number" name="release_year" id="release_year" value="<?php echo htmlspecialchars($release_year); ?>">

        <label for="rating_min">Rating Min:</label>
        <input type="number" name="rating_min" id="rating_min" step="0.1" min="0" max="10" value="<?php echo htmlspecialchars($rating_min); ?>">

        <label for="rating_max">Rating Max:</label>
        <input type="number" name="rating_max" id="rating_max" step="0.1" min="0" max="10" value="<?php echo htmlspecialchars($rating_max); ?>">

        <button type="submit">Filter</button>
    </form>

    <h3>Search Results</h3>
    <div class="movie-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="movie-card">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p>Genre: <?php echo htmlspecialchars($row['genre']); ?></p>
                    <p>Release Year: <?php echo htmlspecialchars($row['release_year']); ?></p>
                    <p>Rating: <?php echo htmlspecialchars($row['rating']); ?> ★</p>
                    <p><a href="movie_details.php?id=<?php echo $row['id']; ?>">View Details</a></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</div>
<?php $conn->close(); ?>
</body>
</html>
