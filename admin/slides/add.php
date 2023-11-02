<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
    redirect(web_root . "admin/index.php");
}

if (isset($_POST['save'])) {
    // Process the image upload here
    // Handle the uploaded image, save it to the server, and perform any other necessary actions
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h1 class="page-header">Image Upload</h1>

    <!-- Image Upload Form Fields -->
    <div class="form-group">
        <label for="image" class="col-md-4 control-label">Select Image:</label>
        <div class="col-md-8">
            <input type="file" name="image" accept="slides/*" required>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <div class="col-md-8">
            <button class="btn btn-primary btn-sm" name="save" type="submit">
                <span class="fa fa-save fw-fa"></span> Upload Image
            </button>
        </div>
    </div>
</form>
