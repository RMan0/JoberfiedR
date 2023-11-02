<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h1>Admin Panel - Image Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>

        <label for="image">Select Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Upload">
    </form>
</body>
</html>
