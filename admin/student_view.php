<?php
// Include the database connection file
include 'conn.php';

// Check if student ID is provided in the URL
if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Prepare the query to retrieve student details
    $stmt = $conn->prepare("SELECT * FROM student WHERE student_id = ?");
    
    // Bind the student ID parameter
    $stmt->bind_param("i", $student_id);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();
    
    // Check if the query execution was successful
    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>View Student</title>
                <!-- Bootstrap CSS -->
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container mt-5">
                    <h2>Student Details</h2>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row["firstname"] . " " . $row["lastname"]); ?></h5>
                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row["email"]); ?></p>
                            <p class="card-text"><strong>Date of Birth:</strong> <?php echo htmlspecialchars($row["dob"]); ?></p>
                            <!-- Display other student details here -->
                        </div>
                    </div>
                </div>
                <!-- Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            </html>
            <?php
        } else {
            echo "Student not found";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If no student ID is provided, display a message
    echo "No student ID provided";
}

// Close the database connection
$conn->close();
?>
