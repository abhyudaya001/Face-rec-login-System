<html>
	<head>
		<title>
			xyz
</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","minip");
$name=$_GET['q'];

$sql="Select fname,lname,gender,email from emp where fname='$name'";

$result = $conn->query($sql);

$info=array();
echo "
<nav class='navbar text-white navbar-dark bg-dark'>
   SEARCH RESULTS
</nav>
<div>
<table class='styled-table' >
<thead>
		<tr>
			<th>S.NO</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
		</tr>
		</thead>
		<tbody>
";
if ($result-> num_rows>0)
{ $i=1;
	while($row=$result->fetch_assoc())
	{  
		echo "<tr>"; 

		echo "<td>".$i."</td>";

		echo "<td>".$row['fname']. "</td>";
    
    	echo "<td>".$row['lname']. "</td>";
    
    	echo "<td>".$row['email']. "</td>";
    
    	echo "<td>".$row['gender']. "</td>";

		echo "<tr>";

		$i=$i+1;
	}
    
}
echo "</tbody>";
echo "</table>";
echo "</div>";
?>
</body>
</html>
