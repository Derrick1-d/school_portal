

<?php
// Your database connection code here
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'school_portal';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['student_id'])) {

    header("Location: login.php");
    exit();
}
// Fetch news data from the database
$query = "SELECT * FROM news";
$result = mysqli_query($conn, $query);

// Check if there are news articles
if ($result && mysqli_num_rows($result) > 0) {
    $newsData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $newsData = []; // Empty array if no news found
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Your existing HTML and Bootstrap structure -->
  <?php include ('sidebar.php')?>
  <div class="container mt-5 mr-5">
        <h2 class="text-center mb-4">Latest News</h2>
        <div class="row">
            <?php foreach ($newsData as $newsItem) : ?>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $newsItem['headline']; ?></h5>
                            <p class="card-text"><?php echo $newsItem['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Your existing HTML and Bootstrap structure -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
