<?php
session_start();

include 'conn.php';


// Check if the user is logged in
if (isset($_SESSION['student_id'])) {
    // Fetch student details from the database
    $student_id = $_SESSION['student_id'];
    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Fetch student results from the database
    $resultsQuery = "SELECT * FROM result WHERE student_id = '$student_id'";
    $resultsResult = mysqli_query($conn, $resultsQuery);
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Function to calculate CGPA
function calculateCGPA($score) {
    if ($score >= 90) {
        return 'A+';
    } elseif ($score >= 80) {
        return 'A';
    } elseif ($score >= 70) {
        return 'B';
    } elseif ($score >= 60) {
        return 'C';
    } elseif ($score >= 50) {
        return 'D';
    } else {
        return 'F';
    }
}

// Function to get grade points
function getGradePoint($grade) {
    switch ($grade) {
        case 'A+':
            return 4.0;
        case 'A':
            return 4.0;
        case 'B':
            return 3.0;
        case 'C':
            return 2.0;
        case 'D':
            return 1.0;
        default:
            return 0.0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Student Portal</title>
</head>

<body>
    <!-- Your existing header content -->
    <?php include("sidebar.php"); ?>
    <main class="container mt-4 mr-4">
        <?php if (isset($_SESSION['student_id'])) : ?>
            
            <p>Student ID: <?php echo $row['student_id']; ?></p>

            <?php if ($resultsResult && mysqli_num_rows($resultsResult) > 0) : ?>
                <h3 class="mt-4">Your Results:</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject ID</th>
                            <th>Subject Name</th>
                            <th>Score</th>
                            
                            <th>Grade</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalCredits = 0;
                        $totalGradePoints = 0;

                        while ($resultRow = mysqli_fetch_assoc($resultsResult)) :
                            $subjectCredits = $resultRow['credit'];
                            $subjectScore = $resultRow['score'];
                            $grade = calculateCGPA($subjectScore);

                            $totalCredits += $subjectCredits;
                            $totalGradePoints += ($subjectCredits * getGradePoint($grade));
                        ?>
                            <tr>
                                <td><?php echo $resultRow['subject_id']; ?></td>
                                <td><?php echo $resultRow['Subject Name']; ?></td>
                                <td><?php echo $subjectScore; ?></td>
                                <td><?php echo $grade; ?></td>
                            </tr>
                        <?php endwhile; ?>

                        <!-- Display CGPA row -->
                        <tr>
                            <td colspan="3" class="text-right"><strong>CGPA:</strong></td>
                            <td><?php echo ($totalCredits > 0) ? number_format($totalGradePoints / $totalCredits, 2) : 'N/A'; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No results available.</p>
            <?php endif; ?>

        <?php else : ?>

        <?php endif; ?>
    </main>
</body>

</html>
