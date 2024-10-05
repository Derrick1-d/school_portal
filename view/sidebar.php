<?php
include 'conn.php';

// Check if the user is logged in
if (isset($_SESSION['student_id'])) {
    // Fetch student details from the database
    $student_id = $_SESSION['student_id'];
    $query = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //Get the user's profile image 
    $profile_image = $row['profile_image'];
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
          <img src="<?php echo $row['profile_image']; ?>" alt="Profile Image" class="img-fluid rounded-circle"
                style="width: 100px;">
                	  				<h3><?php echo $row['firstname'] . '' . $row['lastname']; ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="info_pade.php"><span class="fa fa-home mr-3"></span>Service Information</a>
          </li>
          <?php if (isset($_SESSION['student_id'])) : ?>
          <li>
              <a href="student_detail.php"><span class="fas fa-user mr-3"><small class="d-flex align-items-center justify-content-center"></small></span> Personal Details</a>
          </li>
          <li>
            <a href="elearning.php"><span class="fas fa-graduation-cap mr-3"></span> Elearning</a>
          </li>
          <li>
            <a href="result.php"><span class="fas fa-certificate mr-3"></span> Statement of Results</a>
          </li>
          <li>
            <a href="Survey.php"><span class="fas fa-poll mr-3"></span> Survey</a>
          </li>
          <li>
            <a href="registration.php"><span class="fas fa-user-plus mr-2"></span>Registration</a>
          </li>
          <li>
            <a href="fees.php"><span class="fas fa-dollar-sign mr-2"></span>Fees</a>
          </li>
          <li>
            <a href="counselling.php"><span class="fas fa-hands-helping mr-2"></span>Counselling and Services</a>
          </li>
          <li>
            <a href="exam_table.php"><span class="fas fa-calendar-alt mr-2"></span>Examination Time Table</a>
          </li>
          <li>
            <a href="faqs.php"><span class="fas fa-question-circle mr-2"></span>FAQs</a>
          </li>
          <?php else : ?>
          <li>
            <a href="logn.php"><span class="fa fa-sign-out mr-3"></span> login</a>
          <?php endif; ?>
          </li>
        </ul>

    	</nav>      

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>