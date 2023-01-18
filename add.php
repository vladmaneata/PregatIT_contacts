<?php
require_once 'connect.php';
$FirstName=$_POST['firstName'];
$LastName=$_POST['lastName'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$data = [
    'firstName' => $FirstName,
    'lastName' => $LastName,
    'email' => $email,
    'phone'=>$phone,
];
$sql = "INSERT INTO contacts (FirstName, LastName, Email,Phone) VALUES (:firstName, :lastName, :email,:phone)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);
header('Location: contacts.php');
?>