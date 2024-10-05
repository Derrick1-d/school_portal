<?php
include 'conn.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $student_id = $_GET['id'];

    // Retrieve student details before deletion
    $stmt = $conn->prepare("SELECT * FROM student WHERE student_id = ?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Move the student to the recycle bin
        $stmt = $conn->prepare("INSERT INTO recycle_bin (student_id, firstname, lastname, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $row['student_id'], $row['firstname'], $row['lastname'], $row['email']);
        $stmt->execute();

        // Delete the student from the main table
        $stmt = $conn->prepare("DELETE FROM student WHERE student_id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();

        echo "Student moved to recycle bin successfully";
    } else {
        echo "Student not found";
    }
} else {
    echo "Student ID not provided";
}

$stmt->close();
$conn->close();
?>
