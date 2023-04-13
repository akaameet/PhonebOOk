<?php
     session_start();

     if (!isset($_SESSION['name'])) {
       header('Location: login.php');
       exit();
     }
    include('dbcon.php');

    if(isset($_POST['search']));{
        // $name =strtolower( $_POST['search']);
        $name =$_POST['search'];
    }
    $stmt =$pdo->prepare("SELECT * FROM contact_info where name = :name");
    $stmt -> bindParam(':name',$name);
    $stmt -> execute();
    $value = $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /SL/home.php?id= $value[id]");
?>