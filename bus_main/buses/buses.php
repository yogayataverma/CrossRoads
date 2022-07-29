<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../scrollbar/scrollbar.css">

</head>
<body style="background-image:url('../images/busback.jpg');background-position: center;height:100%;">
<div style="margin-top:-10px;" class="sticky-top"><?php include("../navbar/navbar.html"); ?></div>

<div style="margin-left:350px;position:relative;margin-top:50px;width:50%;height:300px;">
<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from buses where id=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
echo "<div class='card' style='width:160%;margin-left:-200px;margin-bottom:100px;'>
     <div id='carouselExampleSlidesOnly' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
        <img src='../images/wind1.jpg' class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='../images/seatbus1.jpg' class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='../images/tyer1.jpg' class='d-block w-100' alt='...'>
    </div>
  </div>
</div>
     <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    <p class='card-text'>".$row["desci"]."</p>
  </div>
</div>";
}





$sql1="select * from buses where id=2";
$result=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($result))
{
echo "
     <div class='card' style='width:100%;margin-left:0px;margin-bottom:100px;'>
     

     <div class='card' style='width:160%;margin-left:-200px;margin-bottom:100px;'>
     <div id='carouselExampleSlidesOnly' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
        <img src='../images/wind2.jpg' class='d-block w-100' alt='...'  style='width:100px;height:500px;'>
    </div>
    <div class='carousel-item'>
      <img src='../images/seatbus2.jpg' class='d-block w-100' alt='...' style='width:100px;height:500px;'>
    </div>
    <div class='carousel-item'>
      <img src='../images/tyer2.jpg' class='d-block w-100' alt='...' style='width:100px;height:500px;'>
    </div>
  </div>
</div>

     <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    <p class='card-text'>".$row["desci"]."</p>
  </div>
</div>";
}




$sql1="select * from buses where id=3";
$result=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($result))
{
echo "
     <div class='card' style='width:100%;margin-left:0px;margin-bottom:100px;'>
     

     <div class='card' style='width:160%;margin-left:-200px;margin-bottom:100px;'>
     <div id='carouselExampleSlidesOnly' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
        <img src='../images/wind3.jpg' class='d-block w-100' alt='...'  style='width:100px;height:500px;'>
    </div>
    <div class='carousel-item'>
      <img src='../images/seatbus3.jpg' class='d-block w-100' alt='...' style='width:100px;height:500px;'>
    </div>
    <div class='carousel-item'>
      <img src='../images/tyer3.jpg' class='d-block w-100' alt='...' style='width:100px;height:500px;'>
    </div>
  </div>
</div>

     <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    <p class='card-text'>".$row["desci"]."</p>
  </div>
</div>";
}

?>

</div>

</body>
</html>