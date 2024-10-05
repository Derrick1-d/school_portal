<?php
 include 'conn.php';
$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$programme = mysqli_real_escape_string($conn, $_POST['programme']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$cell_phone = mysqli_real_escape_string($conn, $_POST['cell_phone']);
$postal_address = mysqli_real_escape_string($conn, $_POST['postal_address']);
$place_of_birth = mysqli_real_escape_string($conn, $_POST['place_of_birth']);
$hometown = mysqli_real_escape_string($conn, $_POST['hometown']);
$hall_of_residence = mysqli_real_escape_string($conn, $_POST['place_of_residence']);
$institutional_email = mysqli_real_escape_string($conn, $_POST['institutional_email']);
$parent_address = mysqli_real_escape_string($conn, $_POST['parent_address']);

// Upload profile picture (assuming 'uploads' directory exists)
$profilePicturePath = 'uploads/' . basename($_FILES['profilePicture']['name']);
move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profilePicturePath);

$stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, email, dob, gender, programme, level, cell_phone, postal_address, place_of_birth, hometown, hall_of_residence, institutional_email, parent_address, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Check for prepare statement error
if (!$stmt) {
    die("Error in statement preparation: " . $conn->error);
}

// Bind parameters to the prepared statement
$stmt->bind_param("ssssssssssssssss", $firstname, $middlename, $lastname, $email, $dob, $gender, $programme, $level, $cell_phone, $postal_address, $place_of_birth, $hometown, $hall_of_residence, $institutional_email, $parent_address, $profilePicturePath);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Record inserted successfully";
    header("Location: admitstudent.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();
?>