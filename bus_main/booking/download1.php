<?php
if(isset($_POST["fet_p"]))
{

$name=$_POST["name1"];
$email=$_POST["email1"];
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from pass where name='$name' AND email='$email'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);



echo '<div class="container" style="position:relative;margin-top:100px;">
<img src="../images/ticketbackground.jpg" style="margin-left:300px;">
<div style="position:absolute;margin-top:-250px;margin-left:450px;">'.$row["ticket_no"].'</div>
<div style="position:absolute;margin-top:-230px;margin-left:450px;">'.$row["name"].'</div>
<div style="position:absolute;margin-top:-210px;margin-left:450px;">'.$row["pas"].'</div>
<div style="position:absolute;margin-top:-190px;margin-left:450px;">'.$row["food"].'</div>
<div style="position:absolute;margin-top:-170px;margin-left:450px;">'.$row["noc"].'</div>
<div style="position:absolute;margin-top:-150px;margin-left:450px;">'.$row["fac"].'</div>
<div style="position:absolute;margin-top:-250px;margin-left:700px;">'.$row["name_bus"].'</div>
<div style="position:absolute;margin-top:-230px;margin-left:700px;">'.$row["dep_time"].'</div>
<div style="position:absolute;margin-top:-210px;margin-left:700px;">'.$row["dep_place"].'</div>
</div>';


}
?>