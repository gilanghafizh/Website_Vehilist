<?php
include('db.php');
$id = $_GET['id'];

$sql = "DELETE FROM kendaraan WHERE id=$id";
if($conn->query($sql) === TRUE){
    header("location: index.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}