<?php
    include('dbcon.php');
   
    @$invalid = $_GET['invalid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-5">
          <?php if($invalid != null){?>
    <div class="alert alert-danger mb-3" role="alert"><?php echo $invalid ?></div>
    <?php }?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="logindb.php" method="POST">
                    <h2 class="mb-3 text-center">Login</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="d-grid mb-3">
                        <input type="submit" class="btn btn-primary" value="Login">
                        <p class="mb-0 text-center">Are you a new member?<a href="signup.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
