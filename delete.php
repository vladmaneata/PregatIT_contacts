<?php
require_once 'connect.php';
$id=$_GET['delete'];
$sql = "DELETE FROM contacts WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);
header('Location: contacts.php');
?>