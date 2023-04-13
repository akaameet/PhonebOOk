<?php
// check if form is submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get form data
    // if($_GET['id']){
    //     $id = $_GET['id'];
    //     echo $id;
    //    }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // update record in database
    try {
        include('dbcon.php');
        $stmt = $pdo->prepare('UPDATE contact_info SET name = :name, contact = :contact, address = :address, email = :email WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $success = 'Record updated successfully.';

         // redirect to home page after a delay
        header("Location: /SL/home.php");
    } catch (PDOException $e) {
        $error = 'Error updating record: ' . $e->getMessage();
    }
// }
?>

