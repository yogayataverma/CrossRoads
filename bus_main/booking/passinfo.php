<?php

echo "<script>alert('Seat(s) Booked!!!!!')</script>";

$con=mysqli_connect("localhost","root","","bus");
if(isset($_POST["passub"]) && isset($_POST['name1']) && isset($_POST['contact1']) && isset($_POST['email']) && isset($_POST['pas']) && isset($_POST['child']) && isset($_POST['child']) && isset($_POST['food']) && isset($_POST['fac']))
{
$name=$_POST['name1'];
$contact=$_POST['contact1'];
$email=$_POST['email'];
$nop=$_POST['pas'];
$noc=$_POST['child'];
$food=$_POST['food'];
$fac=$_POST['fac'];
$bus=$_POST['name12'];
$ticket=$_POST['ticket'];
$dep_time=$_POST['dep_time'];
$dep_place=$_POST['dep_place'];
$seat=rand(0,20);
$sql="insert into pass(name,contact,email,pas,food,noc,fac,name_bus,ticket_no,dep_time,dep_place,seatno)values('$name','$contact','$email','$nop','$food','$noc','$fac','$bus','$ticket','$dep_time','$dep_place','$seat')";
$res=mysqli_query($con,$sql);

$name1=$_POST["name1"];

$off=@$_POST["off"];

if(isset($_POST["off"]))
{
$price1=$_POST["price1"];
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from offers where id='$off'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$price2=$price1*$row["of"];
}
else
{
$price2=$_POST["price1"];
}

$price1=$price2;

$to_email = $email;
$subject = "CrossRoads Payment Reciept";
$body = "Respected Ma'am / Sir,

We are glad that you chose CrossRoads for Your journey.
This is to inform you that $ $price1 has been deducted from your account for bus $bus.
You can print your ticket now.Happy Journey With Us. ";
$headers = "From: $email";
mail($to_email, $subject, $body, $headers);

echo '
<html>
<head>
<script src="https://kit.fontawesome.com/14cfb2d6a9.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="../scrollbar/scrollbar.css" >
</head>
<body class="bg-white" >
';
include("../navbar/navbar.html");
echo '
<form class="form-group" style="width:690px;margin-left:330px;margin-top:50px;">
<div id="emailHelp" style="margin-left:250px;" class="form-text">CHECK YOUR DETAILS OF RIDE <i class="fas fa-smile-beam"></i>.</div>
<label class="form-label">Name</label>
<input type="text" class="form-control bg-light" placeholder="Name" value="'.$name1.'" disabled>
<label class="form-label">Ticket</label>
'.$off.'
<input type="text" class="form-control bg-light " placeholder="Contact" value="'.$ticket.'" disabled>
<label class="form-label">Email</label>
<input type="text" class="form-control bg-light" placeholder="Email" value="'.$email.'" disabled>
<label class="form-label">Price</label>
<input type="text" class="form-control bg-light" placeholder="amount" id="am" value="'.$price2.'" disabled>
</form>
<div style="margin-left:300px;" name="mail" id="payment_gateway">
</div>

<form>
<script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HGyLjROny20iMc" async> 
</script> 
</form>

<form method="POST" action="payment3.php">
<script name="fet_p" src="https://www.paypal.com/sdk/js?client-id=Ab7SitooHqsDvIK4j7DFqnQ8w7yFv6RsQpBCG2CXafBydRWzwljCZ5xBC4Vhy0OzMasMMwagBmz-ExBT&disable-funding=credit,card"></script>
<script src="payment3.php"></script>
<input type="hidden" name="price3" value="'.$price1.'">
<input type="hidden" name="ticketno" value="'.$ticket.'">
</form>';
}
?>
<div id="emailHelp" style="margin-left:600px;" class="form-text">HAPPY JOURNEY WITH US.</div>
</body>
</html>