<?php
 require_once '../dbcon.php';
 
 if (isset($_GET['bookdelete'])) {
 	$id = base64_decode($_GET['bookdelete']);
 	$sql="DELETE FROM books WHERE id='$id' ";
 	mysqli_query($con,$sql);
    header('location: manage_book.php');
 }
?>