<?php
$con=mysqli_connect("localhost","root","","bus");
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>

</style>
</head>
<body>
<?php

$sql= "select * from seat where id='1'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='button1' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:500px;'>
</button>
<input type='hidden' name='seatno1' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' name='button1' class='seat' style='height:50px;width:50px;background-color:black;margin-left:500px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno1' value='".$row["id"]."'>
</form>
<br>";
}


$sql= "select * from seat where id='2'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='button2' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:500px;'>
</button>
<input type='hidden' name='seatno2' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' name='button2' class='seat' style='height:50px;width:50px;background-color:black;margin-left:500px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno2' value='".$row["id"]."'>
</form>
<br>";
}

?>
</body>
</html>