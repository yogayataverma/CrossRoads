<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php

$conn=mysqli_connect("localhost","root","","bus");
if(isset($_POST['sub'])&&isset($_POST['name'])&&isset($_POST['pass'])&&isset($_POST['email'])&&isset($_POST['contact']))
{
$name=$_POST['name'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$queryse="select * from register";
$result=mysqli_query($conn,$queryse);
while($resultse=mysqli_fetch_array($result))
{
if($resultse['name']==$name && $resultse['email']==$email && $resultse['contact']==$contact)
{
echo "<script>alert('Already Registered!!!!!! Please Login Through Id')</script>";
echo "<script>window.location.replace('../main/main.php')</script>";
exit;
}

}
$queryin="insert into register(name,pass,email,contact)values('$name','$pass','$email','$contact')";
$result1=mysqli_query($conn,$queryin);
echo "<script>alert('Record Instered!!!!  Please Login Through Id')</script>";
echo "<script>window.location.replace('../main/main.php')</script>";
}



if(isset($_POST['sublog']))
{
$name=$_POST['name'];
$pass=$_POST['pass'];
$queryse="select * from register";
$result=mysqli_query($conn,$queryse);
while($resultse=mysqli_fetch_array($result))
{
if($resultse['name']==$name && $resultse['pass']==$pass )
{
$_SESSION['user']=$resultse['name'];
echo "<script>alert('WELCOME!!!!!!!".$_SESSION['user']."')</script>";
echo "<script>window.location.replace('../main/main.php')</script>";
exit;
}

}

}

?>