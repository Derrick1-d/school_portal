


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <title>Timetable page </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="forms/styles.css">
    
        


</head>


<body>
    <?php include ('sidebar.php');?>
    <div class="form-container">
        <div class="header">
            <h3>Update Courses</h3>
            <h3>Courses Information</h3>
        </div>
     
        <form action="process.php" method="post"  enctype="multipart/form-data" onsubmit="return confirmSubmit()">
            
        <div class="form-group">
                <label for="course_name">Course Name </label>
                <input type="text" name="course_name" id="course_name" required>
                <span class="error-message" id="course_name-error"></span>

            </div>
            <div class="form-group">
                <label for="exam_date">Exam Date</label>
                <input type="number" name="exam_date" id="exam_date" required>
                <span class="error-message" id="credit_hours-error"></span>

            </div>


            <div class="form-group">
                <label for="lastname">Course Code</label>
                <input type="text" name="course_code" id="course_code" required>
                <span class="error-message" id="course_code-error"></span>
</div>

           <div class="form-group">
                <label for="exam_time">Exam time</label>
                <input type="time" name="exam_time" id="exam_time" required>
                <span class="error-message" id="credit_hours-error"></span>

            </div>
            <div class="form-group">
                <label for="exam_venue">Exam Venue</label>
                <input type="text" name="exam_venue" id="exam_venue" required>
                <span class="error-message" id="credit_hours-error"></span>

            </div>
            

            <div class="button-container">
                <button id="submit" value="submit" type="submit">Save</button>
                <button id="reset">Reset</button>
            </div>

          

             
            

        

        </form>
    
       
    </div>

</body>
<script src="scr.js"></script>
<script>
       function confirmSubmit() {
            // Display a confirmation dialog
       var confirmed = confirm("Are you sure you want to submit and save the data?");
            
            // If the user clicks OK, the form will be submitted
       return confirmed;
       }

       // JavaScript to print to console and refresh the page
       document.getElementById('studentForm').addEventListener('submit', function() {
            console.log('Success');
       });
    </script>
</html>
