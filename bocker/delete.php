<?php
include 'database.php';
$id=$_GET['id'];
$sql = "DELETE FROM books WHERE id=$id";
$result = $conn->query($sql);
header('Location:/');