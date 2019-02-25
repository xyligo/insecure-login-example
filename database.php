<?php
$user = "insecure";
$pass = "mypass123";

$conn = new mysqli("localhost", $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->select_db("insecure_db");