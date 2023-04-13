<?php
    session_start();
    include('dbcon.php');

    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = ('SELECT name,password FROM user_info');
    $stmt = $pdo->prepare($query);
    $stmt -> execute();

    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($value as $item){
        if($name === $item['name'] && $password === $item['password']){
            $_SESSION['name'] = $name;
            header("Location: /SL/home.php");      
         }

    }

   if(!isset($_SESSION['name'])){
        $invalid = "Invalid Credentials!";
        header("Location: /SL/login.php?invalid= $invalid");
   }

    
?>