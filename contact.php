<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('dbcon.php');
session_start();

if (!isset($_SESSION['name'])) {
  header('Location: login.php');
  exit();
}

      $success = false;

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email=$_POST['email'];

        $query = "INSERT INTO contact_info(name, contact, address,email) VALUES (:name,:contact,:address,:email)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
          $success = true;
        }
      }
    ?>

    <div class="container">
    <?php if ($success): ?>
        <div class="alert alert-info" role="alert"> Added to a contact successfully</div>
      <?php endif; ?>
    <form action="#" method="POST">
        <h1 class="mb-4 text-center"> Add to a Contact</h1>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text"  class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" name="contact" id="contact"  >
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address"id="address" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email"class="form-control" name="email" id="email" required>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
</form>
</div>
<script>
      setTimeout(function() {
        document.querySelector(".alert").style.display = "none"; // hide success message
        window.location.href = "/SL/home.php"; // redirect to main page
      }, 900); // hide the message after 2 seconds
    </script>
</body>
</html>