<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h2>Add Movie</h2>
  <form action="add_movie.php" method="POST">
    <input type="text" name="title" placeholder="Movie Title" required><br>
    <input type="text" name="genre" placeholder="Genre" required><br>
    <input type="text" name="director" placeholder="Director" required><br>
    <input type="number" name="release_year" placeholder="Release Year" required><br>
    <input type="number" name="runtime" placeholder="Runtime (minutes)" required><br>
    <input type="number" step="0.1" name="rating" placeholder="Rating (1-5)" required><br>
    <textarea name="description" placeholder="Movie Description" required></textarea><br>
    <button type="submit">Add Movie</button>
  </form>

</body>
</html>



<?php
// Database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "project"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form inputs
    $title = $conn->real_escape_string($_POST['title']);
    $genre = $conn->real_escape_string($_POST['genre']);
    $director = $conn->real_escape_string($_POST['director']);
    $release_year = intval($_POST['release_year']);
    $runtime = intval($_POST['runtime']);
    $rating = floatval($_POST['rating']);
    $description = $conn->real_escape_string($_POST['description']);

    // Prepare the SQL query to insert the movie data
    $sql = "INSERT INTO movies (title, genre, director, release_year, runtime, rating, description)
            VALUES ('$title', '$genre', '$director', '$release_year', '$runtime', '$rating', '$description')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New movie added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

