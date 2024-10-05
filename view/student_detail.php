<?php
session_start();

include 'conn.php';

$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM student WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    $row['profile_image'] = '';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form is submitted
    // Process the form data and update the student's details in the database
    $updatedEmail = mysqli_real_escape_string($conn, $_POST['updated_email']);
    $updatedHostelName = mysqli_real_escape_string($conn, $_POST['updated_hostel_name']);
    $updatedPhoneNumber = mysqli_real_escape_string($conn, $_POST['updated_phone_number']);

    $updateQuery = "UPDATE student SET email = '$updatedEmail', hostel_name = '$updatedHostelName', phone_number = '$updatedPhoneNumber' WHERE student_id = '$student_id'";

    if (mysqli_query($conn, $updateQuery)) {
        // Reload the page after successful update
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $updateError = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your School Portal - Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href=".css">
    <style>
        .edit-mode input {
            border: 1px solid blue; /* Highlight the input fields in editing mode */
            padding: 2px;
        }

        .table{
            border: 5px solid blue; 
        }

        body{
            background-color: whitesmoke;
        }
    </style>
</head>

<body>

    <?php include('sidebar.php') ?>

    <main class="container mr-5 mt-5">
        <div class="text-center mb-4">
            <img src="<?php echo $row['profile_image']; ?>" alt="Profile Image" class="img-fluid rounded-circle"
                style="width: 100px;">
        </div>
        <?php //echo base64_encode($row['profile_image']); ?>

        <h2 class="mb-4">See Your Details, <?php echo $row['firstname']; ?>!</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Student ID</th>
                        <td><?php echo $row['student_id']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">First Name</th>
                        <td><?php echo $row['firstname']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Last Name</th>
                        <td><?php echo $row['lastname']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td class="edit-mode"><input type="text" name="updated_email" value="<?php echo $row['email']; ?>"
                                required></td>
                    </tr>
                    <tr>
                        <th scope="row">Date Of Birth</th>
                        <td><?php echo $row['date_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Country of Birth</th>
                        <td><?php echo $row['country_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Scholarship ID</th>
                        <td><?php echo $row['scholarship_id']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Institutional Email</th>
                        <td><?php echo $row['institutional_email']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Level</th>
                        <td><?php echo $row['level']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Hall Of Residence</th>
                        <td class="edit-mode"><input type="text" name="updated_hostel_name"
                                value="<?php echo $row['hall_of_residence']; ?>" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Postal Address</th>
                        <td><?php echo $row['postal_address']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cell Phone</th>
                        <td class="edit-mode"><input type="text" name="updated_phone_number"
                                value="<?php echo $row['cell_phone']; ?>" required></td>
                    </tr>
                    <tr>
                        <th scope="row">Programme</th>
                        <td><?php echo $row['programme']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </td>
                    </tr>

                    
                    <!-- Add more rows as needed for other details -->
                </tbody>
            </table>
        </form>
        <footer>
            <p>Learn More</p>
        </footer>

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
