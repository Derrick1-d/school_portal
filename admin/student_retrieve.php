<?php
include 'conn.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $student_id = $_GET['id'];

    // Retrieve student details from recycle bin
    $stmt = $conn->prepare("SELECT * FROM recycle_bin WHERE student_id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Move the student back to the main table
        $stmt = $conn->prepare("INSERT INTO student (student_id, firstname, lastname, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $row['student_id'], $row['firstname'], $row['lastname'], $row['email']);
        $stmt->execute();

        // Delete the student from the recycle bin
        $stmt = $conn->prepare("DELETE FROM recycle_bin WHERE student_id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();

        echo "Student retrieved successfully";
    } else {
        echo "Student not found in recycle bin";
    }
} else {
    echo "Student ID not provided";
}

$stmt->close();
$conn->close();
?>
