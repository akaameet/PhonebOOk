<?php
 session_start();

 if (!isset($_SESSION['name'])) {
   header('Location: login.php');
   exit();
 }
// get record from database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
        include('dbcon.php');
        $stmt = $pdo->prepare('SELECT * FROM contact_info WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <form action="edited.php" method="POST">
        <h1 class="mb-4 text-center" > Update Contact</h1>
        <div class="form-group">
            <input type="text"  class="form-control" name="id" id="id" value="<?php echo $record['id'] ?>" hidden>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text"  class="form-control" name="name" id="name" value="<?php echo $record['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" name="contact" id="contact"  value="<?php echo $record['contact'] ?>"  >
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address"id="address" value="<?php echo $record['address'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email"class="form-control" name="email" id="email" value="<?php echo $record['email'] ?>"  required>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-success" value="Save">
        </div>
</div>
<p>this is astroworld</p>
</body>
</html>
