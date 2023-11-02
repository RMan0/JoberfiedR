<?php
// Database connection setup (modify as needed)
$host = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_db_name";
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle image upload and insert data into the database
if (isset($_POST['TITLE']) && isset($_FILES['image'])) {
    $title = $_POST['TITLE'];
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $IMAGE_URLl = "slides/" . $_FILES['image']['name'];

    // Move uploaded image to the server
    move_uploaded_file($_FILES['image']['tmp_name'], $IMAGE_URL);

    // Insert data into the database
    $sql = "INSERT INTO tblimgslide TITLE, DESCRIPTION, IMAGE_URL) VALUES ('$TITLE', '$DESCRIPTION', '$IMAGE_URL')";
    $mysqli->query($sql);

    // Close the database connection
    $mysqli->close();

    echo "Image uploaded successfully!";
}
?>
