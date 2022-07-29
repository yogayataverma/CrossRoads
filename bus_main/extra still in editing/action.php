<?php
$conn=mysqli_connect("localhost","root","","bus");

$sql="select * from bus_arrival where fare !='' ";
if(isset($_POST['fare']))
{

$fare=implode("','",$_POST['fare']);
$sql.="AND fare IN('".$fare."')";

}

if(isset($_POST['dep_time']))
{

$fare=implode("','",$_POST['dep_time']);
$sql.="AND dep_time IN('".$dep_time."')";

}

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result))
{
echo '<div>
<div class="card">
'.$row["name"].'</div>
</div>';
}

?>