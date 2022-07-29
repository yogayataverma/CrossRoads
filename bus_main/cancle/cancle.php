<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.seat
{

}
</style>
</head>
<body style="background-image:url('../images/seatback.jpg'); height: 145%;background-position: center;background-repeat: no-repeat;background-size: cover;">
<div style="margin-top:-5px;" class="sticky-top" ><?php  include("../navbar/navbar.html");  ?></div>

<form method="POST" action="passinfo2.php">

<div class="form-group" style="width:500px;margin-left:500px;margin-top:100px;">
    <label style="color:white;">Ticket no</label>
    <input type="text" class="form-control" placeholder="Enter Ticket No" name="ticket1" required >
</div>

<div class="form-group" style="width:500px;margin-left:500px;margin-top:100px;">
    <label style="color:white;">Email</label>
    <input type="text" class="form-control" placeholder="Enter Email" name="ticket3" required >
</div>

<div class="form-group" style="width:500px;margin-left:500px;margin-top:100px;">
    <label style="color:white;">Contact no</label>
    <input type="text" class="form-control" placeholder="Enter Contact NO" name="ticket4" required >
</div>

<div class="form-group" style="width:500px;margin-left:500px;">
    <label style="color:white;">Reason</label>
    <div style="display:flex;margin-left:-50px;"><input type="radio" class="form-control" name="ticket2" value="Plan Changed"><p style="color:white">Plan Changed</p>
   <input type="radio" class="form-control" name="ticket2" value="Booked Another Bus" ><p style="color:white">Booked Another Bus</p>
   <input type="radio" class="form-control" name="ticket2" value="Reason Not Listed" ><p style="color:white">Reason Not Listed</p></div>
</div>

     <input type="submit" class="form-control btn btn-danger" value="Submit" name="ticket" style="width:30%;margin-left:550px;" >
</form>

</div>
</body>
</html>