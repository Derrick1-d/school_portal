<?php
// Include the database connection file
include 'conn.php';

// Query to retrieve data from the database
$sql = "SELECT * FROM student";

// Execute the query
$result = $conn->query($sql);

// Check if the query execution was successful
if (!$result) {
    // If there was an error, display the error message
    echo "Error: " . $conn->error;
} else {
    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Records</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .container{
                    margin-left: 350px;
                    margin-top: 100px;
                    text-align: center;
                }

                .table {
            font-size: 15px !important;
            border: 1px solid #dee2e6; /* Add border to the table */
            border-collapse: collapse; /* Collapse borders */
        }

        th, td {
            border: 1px solid #dee2e6; /* Add border to table cells */
            padding: 8px; /* Add padding to cells */
        }
            </style>
        </head>
        <body>
        <?php
  
include 'sidebar.php';
?>
           
            <div class="container">
                <p>Student Records</p>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th> <!-- New column for action buttons -->
                            <!-- Add more table headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["student_id"]; ?></td>
                                <td><?php echo $row["firstname"]; ?></td>
                                <td><?php echo $row["lastname"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td>
                                    <a href="view_student.php?id=<?php echo $row['student_id']; ?>" class="btn btn-primary btn-sm">View</a>
                                    <a href="student_delete.php?id=<?php echo $row['student_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                <!-- Add more table cells as needed -->
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
           
        </body>
        </html>
        <?php
    } else {
        // If no records were found, display a message
        echo "No records found";
    }
}

// Close the database connection
$conn->close();
?>
 
