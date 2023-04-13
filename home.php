<?php 
    session_start();

    if (!isset($_SESSION['name'])) {
      header('Location: login.php');
      exit();
    }

include('dbcon.php');
@$id = $_GET["id"];
if($id != null){
    $stmt =$pdo->prepare("SELECT * FROM contact_info where id = :id");
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $s_value = $value[0]['name'];
    }
    else{
    $stmt = $pdo->query('SELECT * FROM contact_info');
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $s_value = "Search Name";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
</head>
<body>
    
        <h1  class="text-center">Phone Book</h1>
       
        <div class="d-flex justify-content-end align-items-center">
    <form class="form-inline my-2 my-lg-1" action="search.php" method="POST" >
        <div class="form-group row justify-content-center">
            <div class="col-sm-6">
                <input type="text" class="form-control rounded-pill" name="search" placeholder="<?php echo $s_value ?>" />
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary rounded-pill">Search</button>
            </div>
        </div>
    </form>
</div>

    <table class="table table-hover table-border table-striped my-5 ">
        <thead>
            <tr>
                <th scope="col-2 " style="background-color: beige;">S.N</th>
                <th scope="col-2" style="background-color: beige;">Name</th>
                <th scope="col-2" style="background-color: beige;">Contact</th>
                <th scope="col-2" style="background-color: beige;">Address</th>
                <th scope="col-2" style="background-color: beige;">Email</th>
                <th scope="col-2" style="background-color: beige;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $item) { ?>
            <tr>
                <td><?php echo $item['id']?></td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['contact']?></td>
                <td><?php echo $item['address']?></td>
                <td><?php echo $item['email']?></td>
                <td class="d-flex justify-content-around align-items-center">
                    <form action="edit.php" method="GET">
                        <button class="btn btn-primary btn-sm text-white" type="submit" name="id" value="<?php echo $item['id']?>">Edit</button>
                    </form>
                    <form action="delete.php" method="GET">
                        <button class="btn btn-danger btn-sm text-white" type="submit" name="id" value="<?php echo $item['id']?>">Delete</button>
                    </form>
                    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-around align-items-center">
        <a href="/SL/contact.php#">
            <button class="btn btn-success btn-md my-3 text-white">Add Contact</button>
        </a>
        <form action="logout.php" method="POST">
                        <button class="btn btn-danger btn-md my-3 text-white" type="submit" name="logout" value="logout">Logout</button>
                    </form>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            </body>
            </html>
