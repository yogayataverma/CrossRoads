<?php
$con=mysqli_connect("localhost","root","","bus");
if($con)
{
echo "connected";
}
if(isset($_POST["sub12"]))
{
$name=$_POST["test"];
$contact=$_POST["test"];
$nop=$_POST["test"];
$email=$_POST["test"];
$noc=$_POST["test"];
$pas=$_POST["test"];
$fac=$_POST["test"];
$food=$_POST["test"];
echo $name;
$res=mysqli_query($con,$sql);
echo "done";
}
?>