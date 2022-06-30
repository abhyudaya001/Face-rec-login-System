<?php
    
    $img = $_POST['image'];
    $folderPath = "students/";
    $email=$_POST['email'];
    $uname= $_POST['uname'];
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $gender=$_POST['gender'];
    $con=mysqli_connect("localhost","root","","minip");
    $q="select * from emp where PID='$uname'";
    if($con->query($q)){
        echo "<script>alert('Value already exists');
        window.location.replace('register.html');</script>";
    }
    $sql="INSERT INTO emp(fname,lname,gender,email,PID) VALUES('$first_name','$last_name','$gender','$email','$uname')";
    $result=$con->query($sql);
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $uname . '.jpg';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    header("location:login.html");
  
?>