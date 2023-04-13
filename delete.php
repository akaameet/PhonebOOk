<?php
   include('dbcon.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $stmt = $pdo->prepare('DELETE FROM contact_info WHERE id = :id');
    $stmt->bindParam(':id', $id);
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->errorInfo()[2];
    }
    header("Location: /SL/home.php");
    exit();
?>