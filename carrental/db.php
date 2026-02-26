<?php
$conn = new mysqli("localhost","root","","car_rental");
if($conn->connect_error){
    die("Connection Failed");
}
?>
