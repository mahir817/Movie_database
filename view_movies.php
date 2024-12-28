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
</head>
<body>
<div class="header">
    <h2>View Movies</h2>
</div>
<div class="content">
    <!-- Genre display -->
    <?php if ($genre_filter): ?>
        <h3>Movies in <?php echo htmlspecialchars($genre_filter); ?> Genre</h3>
    <?php else: ?>
        <h3>All Movies</h3>
    <?php endif; ?>

    <!-- Sort Form -->
    <form method="get" action="view_movies.php" class="sort-form">
        <label for="sort_by">Sort by:</label>
        <select name="sort_by" id="sort_by">
            <option value="title" <?php echo ($sort_by == 'title') ? 'selected' : ''; ?>>Title</option>
            <option value="genre" <?php echo ($sort_by == 'genre') ? 'selected' : ''; ?>>Genre</option>
            <option value="release_year" <?php echo ($sort_by == 'release_year') ? 'selected' : ''; ?>>Release Year</option>
            <option value="rating" <?php echo ($sort_by == 'rating') ? 'selected' : ''; ?>>Rating</option>
        </select>
        <label for="order">Order:</label>
        <select name="order" id="order">
            <option value="ASC" <?php echo ($order == 'ASC') ? 'selected' : ''; ?>>Ascending</option>
            <option value="DESC" <?php echo ($order == 'DESC') ? 'selected' : ''; ?>>Descending</option>
        </select>
        <button type="submit">Sort</button>
    </form>

    <!-- Movie List Table -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>Rating</th>
                <th>Runtime</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['genre']); ?></td>
                        <td><?php echo htmlspecialchars($row['release_year']); ?></td>
                        <td><?php echo htmlspecialchars($row['rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['runtime']); ?> mins</td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No movies found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php $conn->close(); ?>
