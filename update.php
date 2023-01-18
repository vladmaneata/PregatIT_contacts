<?php
require_once 'connect.php';
$id=$_POST['id'];
$FirstName=$_POST['firstNameUpd'];
$LastName=$_POST['lastNameUpd'];
$email=$_POST['emailUpd'];
$phone=$_POST['phoneUpd'];

$data = [
    'firstName' => $FirstName,
    'lastName' => $LastName,
    'email' => $email,
    'phone'=>$phone,
    'id'=>$id,
];
$sql = "UPDATE contacts SET FirstName=:firstName, LastName=:lastName, Email=:email, Phone=:phone WHERE id=:id";
$stmt= $pdo->prepare($sql);
$stmt->bindParam(':firstName',$FirstName);
$stmt->bindParam(':lastName',$LastName);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':id',$id);
$stmt->execute($data);
header('Location: contacts.php');
?>