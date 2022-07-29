<?php
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['message'])&&isset($_POST['consub']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$con=mysqli_connect("localhost","root","","bus");
$sql="INSERT INTO contactus(name,email,message) VALUES ('$name','$email','$message')";
$result=mysqli_query($con,$sql);
echo "<script>alert('Message Transfered.We will Contact You Soon!!!!!')</script>";
echo "<script>window.location.replace('../main/main.php')</script>";
}
?>