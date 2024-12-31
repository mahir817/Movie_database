<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
if (!$id) {
    die("Invalid ID");
}

// Fetch movie details
$sql = "SELECT * FROM movies WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $movie = $result->fetch_assoc();
} else {
    die("Movie not found");
}

// Update movie details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $rating = $_POST['rating'];
    $runtime = $_POST['runtime'];

    $update_sql = "UPDATE movies SET title=?, description=?, genre=?, release_year=?, rating=?, runtime=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssisi", $title, $description, $genre, $release_year, $rating, $runtime, $id);
    $update_stmt->execute();

    header("Location: view_movies.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="header">
        <h2>Edit Movie</h2>
    </div>
    <div class="content">
        <form method="post">
            <label for="title">Title:</label>
            <br><input type="text" name="title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>

            <br><label for="description">Description:</label>
            <br><textarea name="description" rows="4" required><?php echo htmlspecialchars($movie['description']); ?></textarea>

            <br><label for="genre">Genre:</label>
            <br><input type="text" name="genre" value="<?php echo htmlspecialchars($movie['genre']); ?>" required>

            <br><label for="release_year">Release Year:</label>
            <br><input type="number" name="release_year" value="<?php echo htmlspecialchars($movie['release_year']); ?>" required>

            <br><label for="rating">Rating:</label>
            <br><input type="text" name="rating" value="<?php echo htmlspecialchars($movie['rating']); ?>" required>

            <br><label for="runtime">Runtime (minutes):</label>
            <br><input type="number" name="runtime" value="<?php echo htmlspecialchars($movie['runtime']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>
        <a href="view_movies.php">Cancel</a>
    </div>
</body>
</html>
