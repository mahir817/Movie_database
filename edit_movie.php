<?php

include('server.php');


if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Fetch movie details based on the ID
    $sql = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movie = $result->fetch_assoc();
    
    // If no movie found
    if (!$movie) {
        echo "Movie not found!";
        exit;
    }
}

// Handle the form submission for updating the movie details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form values
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];
    $runtime = $_POST['runtime'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];

    // Update the movie details in the database
    $update_sql = "UPDATE movies SET title = ?, genre = ?, director = ?, release_year = ?, runtime = ?, rating = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssiidssi", $title, $genre, $director, $release_year, $runtime, $rating, $description, $movie_id);

    if ($stmt->execute()) {
        echo "Movie details updated successfully!";
    } else {
        echo "Error updating movie details!";
    }
}



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
  <h2>Edit Movie Details</h2>
</div>

<div class="content">
  <form action="edit_movie.php?id=<?php echo $movie_id; ?>" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $movie['title']; ?>" required>

    <label for="genre">Genre</label>
    <input type="text" name="genre" id="genre" value="<?php echo $movie['genre']; ?>" required>

    <label for="director">Director</label>
    <input type="text" name="director" id="director" value="<?php echo $movie['director']; ?>" required>

    <label for="release_year">Release Year</label>
    <input type="number" name="release_year" id="release_year" value="<?php echo $movie['release_year']; ?>" required>

    <label for="runtime">Runtime (minutes)</label>
    <input type="number" name="runtime" id="runtime" value="<?php echo $movie['runtime']; ?>" required>

    <label for="rating">Rating (out of 5)</label>
    <input type="number" name="rating" id="rating" value="<?php echo $movie['rating']; ?>" step="0.1" min="0" max="5" required>

    <label for="description">Description</label>
    <textarea name="description" id="description" rows="4" required><?php echo $movie['description']; ?></textarea>

    <button type="submit">Update Movie</button>
  </form>

  <!-- Delete Button -->
  <form action="edit_movie.php?id=<?php echo $movie_id; ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this movie?');">
    <button type="submit" name="delete" class="delete-btn">Delete Movie</button>
  </form>
</div>

</body>
</html>

<style>
  .delete-btn {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
  }

  .delete-btn:hover {
    background-color: darkred;
  }
</style>
