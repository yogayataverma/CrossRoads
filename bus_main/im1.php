<html>
</body>
<?php
$con=mysqli_connect("localhost","root","","bus");
$sql1="select * from img";
$sql=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($sql))
{

}

?>
</body>
</html>