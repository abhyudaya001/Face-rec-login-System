<?php
$eml=$_POST["email"];
$pss=$_POST["password"];
// Creating connection
$conn = new mysqli("localhost","root","","face-rec");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO registration (email, password) VALUES ('$eml', '$pss')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>