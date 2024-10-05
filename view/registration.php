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

mysqli_select_db($conn, $database);

// Query to retrieve available courses
$query = "SELECT * FROM course";
$result = mysqli_query($conn, $query);

if(isset($_POST['enroll'])){
   $student=$_SESSION['student_id'];
    $selectedCourses=$_POST['enroll_course'];

    $sql="INSERT INTO course_enrolled(student_id,course_id) VALUES";
    foreach($selectedCourses as $course){
        $sql.="('".$student."',".$course."),";
    }
    $sql=substr($sql,0,strlen($sql)-1);


   if(mysqli_query($conn,$sql)){
     header('Location:enrollment_success.php');
   }else{
    echo "<p style='color:red;'>Enrollment Failed</p>";
   }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Courses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<?php include("sidebar.php"); ?>

<div class="container mt-5 mr-5">
    <h1 class="text-center mb-4">Available Courses</h1>
    <form method="post" action="">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Credit Hours</th>
                    <th>Enroll</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['course_code']}</td>";
                    echo "<td>{$row['course_name']}</td>";
                    echo "<td>{$row['credit_hours']}</td>";
                    echo "<td><input type='checkbox' class='form-check-input' name='enroll_course[]' value='{$row['course_id']}'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <button type="submit" name='enroll' class="btn btn-primary">Enroll</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
