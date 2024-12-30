<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all unique genres
$sql = "SELECT DISTINCT genre FROM movies ORDER BY genre ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="header">
    <h2>Movie Genres</h2>
</div>
<div class="content">
    <h3>Explore by Genre</h3>
    <ul class="genre-list">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><a href="view_movies.php?genre=<?php echo urlencode($row['genre']); ?>">
                    <?php echo htmlspecialchars($row['genre']); ?>
                </a></li>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No genres available.</p>
        <?php endif; ?>
    </ul>
</div>
</body>
</html>

<?php $conn->close(); ?>
