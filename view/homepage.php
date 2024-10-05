<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
          <?php if (isset($_SESSION['student_id'])) : ?>
              <h2>Welcome, <?php echo $row['firstname']; ?>!</h2>
              <p>Student ID: <?php echo $row['student_id']; ?></p>
              <p>Email: <?php echo $row['email']; ?></p>
          <?php else : ?>
              <div class="display">
              <h2>Welcome to the University Portal</h2>
              <p>Please log in to view your details.</p>
              </div>
          <?php endif; ?>
      </main>
</body>
</html>