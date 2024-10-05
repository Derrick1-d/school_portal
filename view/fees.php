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


// Fetch student details from the database
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM student WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Fetch fee details from the database
$fees_query = "SELECT * FROM fees WHERE student_id = '$student_id'";
$fees_result = mysqli_query($conn, $fees_query);
$fees_row = mysqli_fetch_assoc($fees_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your School Portal - Fees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom styles here -->
</head>

<body>
    <?php include('sidebar.php') ?>

    <main class="container mt-5 mr-5">
        <h2 class="mb-4 ">Fee Information for <?php echo $row['firstname']; ?></h2>
        <p>Student ID: <?php echo $row['student_id']; ?></p>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Total Fees</th>
                    <td>$<?php echo $fees_row['total_fees']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Balance</th>
                    <td>$<?php echo $fees_row['balance']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Carry Forward</th>
                    <td>$<?php echo $fees_row['carry_forward']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Semester/Year</th>
                    <td><?php echo $fees_row['semester_year']; ?></td>
                </tr>
                <!-- Add more rows as needed for other fee details -->
            </tbody>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add your custom scripts here -->
</body>

</html>
