<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
</head>
<style>
.student-profile .card {
  border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}

.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
}

.student-profile .card p {
  font-size: 16px;
  color: #000;
}

.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}
</style>
<body>
  <?php
  $conn=mysqli_connect("localhost","root","","minip");
  $sql="SELECT * from session;";
  $result = $conn->query($sql);
  if ($result-> num_rows>0){
  $row=$result->fetch_assoc();
  }
  $p= $row['name'];
  $sql1="SELECT * FROM emp where PID='$p'";
  $result= $conn->query($sql1);
  if ($result-> num_rows>0){
    $row=$result->fetch_assoc();
    } ?>
  <nav class="navbar text-white navbar-dark bg-dark">
    <a href="#" class="navbar-brand">
      HOME
      </a>
    <a onclick="logout()" href="./login.html" class="navbar-brand" target="_blank">
      LOGOUT 
      </a>
    </nav>
    <div class="container">
        <form action="search.php" method="get" target="_blank" id="search-form">
          <input name="q" type="text" placeholder="Search" autocomplete="off" autofocus>
        </form>
        <p class="info"></p>
      </div>
      
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="./students/<?php echo $row['email'] ?>.jpg" alt="student dp">
            <h3> Akshay Rawat</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
            <tr>
                <th width="30%">User Name</th>
                <td width="2%">:</td>
                <td><?php echo $row['PID'] ?></td>
              </tr>
              <tr>
                <th width="30%">First Name</th>
                <td width="2%">:</td>
                <td><?php echo $row['fname'] ?></td>
              </tr>
              <tr>
                <th width="30%">Last Name</th>
                <td width="2%">:</td>
                <td><?php echo $row['lname'] ?></td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td><?php echo $row['gender'] ?></td>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><?php echo $row['email'] ?></td>
              </tr>
            </table>
          </div>
        </div>
          
  </div>
  </div>
</body>
<script src="./js/main.js"></script>
<script>
  function logout(){
    close();
  }
</script>
</html>