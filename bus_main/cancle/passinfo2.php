<?php
if(isset($_POST["ticket"]))
{
if($_POST["ticket2"])
{
$tick=$_POST["ticket1"];
$tick3=$_POST["ticket2"];
$tick4=$_POST["ticket3"];
$tick5=$_POST["ticket4"];
$sql2="insert into cancle(ticket,reason,email,contact)values('$tick','$tick3','$tick4','$tick5')";
mysqli_query($con,$sql2);
}
else
{
$tick3=$_POST["ticket2"];
$tick4=$_POST["ticket3"];
$tick5=$_POST["ticket4"];
$sql3="insert into cancle(reason,email,contact)values('$tick3','$tick4','$tick5')";
mysqli_query($con,$sql3);
}
echo "<script>alert('Ticket Cancelled!!!!!')</script>";
echo "<script>window.location.replace('../cancle/cancle.php')</script>";
}
?>