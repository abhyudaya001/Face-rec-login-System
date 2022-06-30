<?php
$conn=mysqli_connect("localhost","root","","minip");
$name=$_GET['q'];

$sql="Select fname,lname,gender,email from emp where fname='$name'";

$result = $conn->query($sql);
$lastname="abhyu";
$email="abd";

$info=array();

if ($result-> num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		if($row['fname']==$name)
			{
                $lastname=$row['lname'];
                $email=$row['email'];
               
            }
            else echo "not found name";
                
	}
    
}else echo "not found";
echo $name;
echo $lastname;
echo $email;


?>