<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'school_portal';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Get admin ID or any identifier
    $admin_id = $_SESSION['student_id'];

    // Validate and process the uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Move the uploaded image to a folder (e.g., 'uploads/')
        $upload_path = 'uploads/';
        $target_path = $upload_path . $image_name;
        move_uploaded_file($image_tmp, $target_path);

        // Insert image data into the database
        $insert_query = "INSERT INTO admin_images (admin_id, image_path) VALUES ('$admin_id', '$target_path')";
        mysqli_query($conn, $insert_query);

        echo "Image uploaded successfully!";
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Image Upload</title>
</head>

<body>
    <h2>Admin Image Upload</h2>
    <form action="upload_process.php" method="post" enctype="multipart/form-data">
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        <button type="submit" name="submit">Upload Image</button>
    </form>
</body>

</html>
