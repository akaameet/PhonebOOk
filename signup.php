<?php
    include('dbcon.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
    }


    $query = ('INSERT INTO user_info(name, password) VALUES (:name, :password)');
    $stmt = $pdo->prepare($query);
    $stmt -> bindParam(':name',$name);
    $stmt -> bindParam(':password',$password);
    
    if($stmt -> execute()){
        $success = 'Sign up successfully.';
    }
    header("Refresh: 1; url=/SL/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-5">
    <?php if (isset($success)): ?>
        <div class="alert alert-success" role="alert" ><?php echo $success?></div>
    <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="#" method="POST">
                    <h1 class="mb-4 text-center">Sign up</h1>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="d-grid mb-3">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
