<?php
    
    $img = $_POST['image'];
    $folderPath = "students/";
    $email= $_POST['email'];
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $gender=$_POST['gender'];
    $con=mysqli_connect("localhost","root","","minip");
    
    $sql="INSERT INTO user(fname,lname,gender,email) VALUES('$first_name','$last_name','$gender','$email')";
    $result=$con->query($sql);
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $email . '.jpg';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    header("location:login.html");
  
?>