<html>
<head>
<title>document</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","bus");
if($con==false)
{
echo "Failed to connect to MYSQL Server".mysqli_connect_error();
}
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
mysqli_query($con,"INSERT INTO register(name,pass)VALUES('$email','$password')");
echo "<br>Record inserted successfully";
mysqli_close($con);
?>
</body>
</html>