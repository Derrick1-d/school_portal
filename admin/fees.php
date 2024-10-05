


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <title>Fees page </title>

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
                <label for="student_id">Student Id </label>
                <input type="text" name="student_id" id="student_id" required>

            </div>
            <div class="form-group">
                <label for="total_fees">Total Fees</label>
                <input type="number" name="total_fees" id="total_fees" required>
            </div>


            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="number" name="balance" id="balance" required>
            </div>

            <div class="form-group">
                <label for="carry_forward">Balance carry Forward</label>
                <input type="number" name="carry_forward" id="carry_forward" required>
            </div>

            <div class="form-group">
                <label for="semester_year">Semester Year</label>
                <input type="text" name="semester_year" id="semester_year" required>
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
