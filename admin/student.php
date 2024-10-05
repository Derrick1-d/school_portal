


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <title>Admit student page </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="forms/styles.css">
    
        


</head>


<body>
    <?php include ('sidebar.php');?>
    <div class="form-container">
        <div class="header">
            <h3>Add Student Form</h3>
            <h3>Student Information</h3>
        </div>
     
        <form action="process.php" method="post"  enctype="multipart/form-data" onsubmit="return confirmSubmit()">
            
        <div class="form-group">
                <label for="student_id">Student Id </label>
                <input type="text" name="student_id" id="student_id" required>
                <span class="error-message" id="firstname-error"></span>

            </div>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" required>
                <span class="error-message" id="firstname-error"></span>

            </div>


            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" required>
                <span class="error-message" id="lastname-error"></span>
            </div>

            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" name="email" id="email" placeholder="optional">
                <span class="error-message" id="email-error"></span>

            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
            </div>

            <div class="form-group">
                <label for="country_of_birth">Country Of Birth</label>
                <input type="text" name="country_of_birth" id="country_of_birth" required>
                <span class="error-message" id="firstname-error"></span>

            </div>

            <div class="form-group">
                <label for="gender">Select your gender:</label>
                    <select id="gender" name="gender">
                         <option value="male">
                               Male
                          </option>
                            <option value="female">
                                Female
                            </option>

                </select><br>
           </div>


           <div class="form-group">
            <label for="programme">Program Of Study</label>
            <input type="text" id="programme" name="programme">
           </div>

           <div class="form-group">
                <label for="level">Level</label>
                <input type="text" name="level" id="level" required>
                <span class="error-message" id="level-error"></span>

            </div>

            <div class="form-group">
                <label for="firstname">Institutional Email</label>
                <input type="email" name="institutional_email" id="institutional_email" required>
                <span class="error-message" id="firstname-error"></span>

            </div>

            <div class="form-group">
                <label for="phone_number">Phone</label>
                <input type="text" name="cell_phone" id="cell_phone" optional>
            </div>

            <div class="form-group">
                <label for="postal_address">Postal Address</label>
                 <input type="text" name="postal_address" id="postal_address" optional>
            </div>

            <div class="form-group">
                <label for="nationlity">Nationality</label>
                <input type="text" name="Nationality" id="nationlity" optional>
            </div>

            <div class="form-group">
                <label for="hall_of_residence">Hall of Residence</label>
                <input type="text" name="hall_of_residence" id="hall_of_residence" optional>
            </div>

            <div class="form-group">
                <label for="scholarship_id">Scholarship ID</label>
                <input type="text" name="scholarship_id" id="scholarshid_id" >
                <span class="error-message" id="firstname-error"></span>

            </div>

            <div class="form-group">
            <label for="profilePicture">Upload Profile Picture (150px by 150px):</label>
               <input type="file" name="profile_image" id="profile_image" accept="image/*">
                
                <?php
    // Use $errorMessage where needed in your HTML
    if (!empty($errorMessage)) {
        echo "<p style='color: red;'>$errorMessage</p>";
    }
    ?>
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
