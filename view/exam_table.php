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

// Check if the user is logged in
if (isset($_SESSION['student_id'])) {
    // Fetch student details from the database
    $student_id = $_SESSION['student_id'];
    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Fetch examination timetable from the database
    $timetableQuery = "SELECT * FROM exam_timetable";
    $timetableResult = mysqli_query($conn, $timetableQuery);
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Student Portal - Examination Timetable</title>
</head>
<body>

<?php include("sidebar.php"); ?>

<main class="container mt-4 mr-5">
    <?php if (isset($_SESSION['student_id'])) : ?>
        <p>Student ID: <?php echo $row['student_id']; ?></p>

        <?php if ($timetableResult && mysqli_num_rows($timetableResult) > 0) : ?>
            <h3 class="mt-4">Examination Timetable:</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Exam Date</th>
                        <th>Exam Time</th>
                        <th>Exam Venue</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($timetableRow = mysqli_fetch_assoc($timetableResult)) : ?>
                        <tr>
                            <td><?php echo $timetableRow['id']; ?></td>
                            <td><?php echo $timetableRow['course_id']; ?></td>
                            <td><?php echo $timetableRow['course_name']; ?></td>
                            <td><?php echo $timetableRow['exam_date']; ?></td>
                            <td><?php echo $timetableRow['exam_time']; ?></td>
                            <td><?php echo $timetableRow['exam_venue']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No examination timetable available.</p>
        <?php endif; ?>

    <?php else : ?>
        
    <?php endif; ?>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</body>
</html>
