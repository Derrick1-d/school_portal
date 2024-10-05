<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Icons Grid</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php include 'nav.php'; 
include 'sidebar.php';
?>

<div class="icon-container">
  <div class="icon-box">
    <i class="fas fa-user-graduate attendance-icon fa-4x"></i>
   <a href="student.php"> <p>Add Student</p></a> 
  </div>
  <div class="icon-box">
    <i class="fas fa-list class-list-icon fa-4x"></i>
    <a href="#"> <p>Student List</p></a> 
  </div>
  <div class="icon-box">
    <i class="fas fa-table timetable-icon fa-4x"></i>
    <a href="#"> <p>View available Time Table</p></a> 
    </div>
  <div class="icon-box">
    <i class="fas fa-calendar-alt exam-timetable-icon fa-4x"></i>
    <a href="timetable.php"> <p> Add Exam Time Table</p></a>   
  </div>
  <div class="icon-box">
    <i class="fas fa-calendar-week calendar-icon fa-4x"></i>
    <a href="#"> <p>Calander</p></a> 
    </div>
  <div class="icon-box">
    <i class="fas fa-newspaper news-icon fa-4x"></i>
    <a href="#"> <p>News Page</p></a> 
    </div>
  <div class="icon-box">
    <i class="fas fa-poll exam-results-icon fa-4x"></i>
    <a href="#"> <p>Exam Results</p></a> 
    </div>
  <div class="icon-box">
    <i class="fas fa-cogs settings-icon fa-4x"></i>
    <a href="#"> <p>Settings</p></a>
     </div>
  <div class="icon-box">
    <i class="fas fa-cog configuration-icon fa-4x"></i>
    <a href="#"> <p>Configuration</p></a> 
    </div>
</div>

</body>
</html>
