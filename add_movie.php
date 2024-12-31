<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="style2.css">
  <style>
    /* Styling for the form container */
    form {
      max-width: 1500px;  
      margin: 0 auto;
      background-color: white;
      padding: 50px;  
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Styling for input fields and textarea */
    input, textarea {
      width: 100%;
      padding: 12px;  
      margin-bottom: 20px;  
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    /* Removing the appearance of numbers */
    input[type="number"] {
      -moz-appearance: textfield;
    }

    /* Styling for placeholders */
    input::placeholder, textarea::placeholder {
      font-size: 18px;
      color: #888;
    }

    /* Focus state for inputs and textarea */
    input:focus, textarea:focus {
      border-color: #5b9bd5;
      outline: none;
    }

    /* Styling for the submit button */
    button {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 18px;
      cursor: pointer;
    }

    /* Hover effect for the button */
    button:hover {
      background-color: #45a049;
    }

    /* Styling for logout link */
    .logout-link {
      font-size: 16px;
      color: white;
    }

    .logout-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Add New Movies</h2>
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
$username = "root"; 
$password = ""; 
$dbname = "project";

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

