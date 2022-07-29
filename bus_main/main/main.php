<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../scrollbar/scrollbar.css">
<style>
*{
margin:0;
padding:0;
}

#down_links
{
color:white;
text-decoration:none;
}

a:hover
{
color:red;
}

.header
{
 height:100vh;
}

.video-background
{
position:absolute;
right:0;
bottom:0;
width:100%;
height:100%;

}

</style>
</head>
<body class="bg-light scrollbar">
<section class="header">
<video autoplay loop class="video-background" muted>
<source src="rain12.mp4" type="video/mp4">
</source>

</video>
</section>

<button style="margin-left:650px;margin-top:-350px;position:absolute;" class="btn btn-danger"><a href="#about" style="text-decoration:none;color:white;">Welcome!!!!!</a></button>
<a class="about_scroll" name="about"></a>
<?php include("C:/xampp1/htdocs/web1/bus_main/navbar/navbar.html"); ?>

<p style=" font-weight: bold;margin-left:600px;text-decoration:underline;font-size:60px;"><br>About Us</p>


<pre style="font-size:20px;">                       Make Online Bus Ticket Bookings across India with CrossRoad.com and get great discounts. 
                       CrossRoad is an initiative to make booking tickets a hassle free process.</pre>

<form class="form-group" style="display:flex;margin-top:50px;" method="POST" action="../booking/buses2.php">
<input type="submit" value="BOOK" name="search" class="form-control bg-danger" style="width:30%;margin-right:10px;color:white;margin-left:500px;">
</form>

<div id="container" style="width:1350px;height:700px;margin-top:50px;">
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img class="d-block w-100" src="../images/YoloBus.jpg" style="height:694px;width:500px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../images/YoloBus1.jpg" style="height:694px;width:500px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../images/YoloBus2.jpg" style="height:694px;width:500px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>

<p style="margin-left:450px;text-decoration:underline;font-size:30px;"><br>WHY BOOK WITH CROSSROADS</p>


<div class="container" >
  <div class="row" style="width:100%;height:400px;background-color:white;">
    <div class="col border" style="background-color:white;">
    <br><br><br><br><br><br>
     <img src="../images/safety1.png" style="margin-left:80px;">
     <br><br><br><br><br><br><div style="margin-left:140px;background-color:white;">SAFETY +</div><br>
     <div style="margin-left:20px;background-color:white;">With Safety+ we have brought in a set of measures like Sanitized buses, mandatory masks etc. to ensure you travel safely.</div><br><br><br>
    </div>
    <div class="col border" style="background-color:white;">
      <br><br><br><br><br>
     <img src="../images/rs.jpg" style="margin-left:80px;width:180px;">
     <br><br><br><br><br><br><div style="margin-left:120px;">LOWEST PRICES</div><br><br>
     <div style="margin-left:20px">We put our experience and relationships to good use and are available to solve your travel issues.</div><br><br><br>
    </div>
    <div class="col border" style="background-color:white;">
       <br><br><br><br><br><br>
     <img src="../images/ben.jpg" style="margin-left:50px;width:250px;background-color:white;">
     <br><br><br><br><br><br><div style="margin-left:100px;background-color:white;">UNMATCHED BENEFITS</div><br>
     <div style="margin-left:20px;background-color:white;">We take care of your travel beyond ticketing by providing you with innovative and unique benefits.</div><br><br><br>
    </div>
  </div>
</div>
<p style=" font-weight: bold;margin-left:500px;text-decoration:underline;font-size:60px;margin-top:250px;font-size:30px;"><br>HOW TO BOOK BUS SEAT</p>

<div style="border-style:solid;margin-top:70px;width:550px;margin-left:400px;">
<img src="../images/buspageicon1.png">
</div>


<p style=" font-weight: bold;margin-left:520px;text-decoration:underline;font-size:60px;"><br>Contact Us</p>
<small id="emailHelp" class="form-text text-muted" style="margin-left:540px;">We'll never share your details with anyone else.</small>
<br><br><br>
<form class="border" style="width:1150px;margin-left:100px;border-radius:5px;" method="POST" action="contactus.php">
  <div class="form-group" style="margin-top:100px;">
    <label style="border-style:none;width:500px;margin-left:100px;">Enter Name</label>
    <input type="text" class="form-control" style="border-style:none;width:940px;margin-left:100px;"  name="name" required>
  </div>
  <div class="form-group">
    <label style="border-style:none;width:700px;margin-left:100px;">Email address</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" name="email" style="border-style:none;width:940px;margin-left:100px;">
    <small id="emailHelp" class="form-text text-muted" style="border-style:none;width:500px;margin-left:100px;">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label style="border-style:none;width:500px;margin-left:100px;">Query</label>
    <textarea class="form-control" style="border-style:none;width:940px;margin-left:100px;" rows="5" name="message" ></textarea>
  </div>
  <button type="submit" class="btn btn-danger" style="border-style:none;width:940px;margin-left:100px;margin-bottom:100px;" name="consub">Submit</button>
</form>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.3897418070937!2d76.77626521513156!3d30.735552081636133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feda7371d20cb%3A0x3a4da6aec091e615!2sISBT%20Road%2C%2017G%2C%2017F%2C%20Sector%2017%2C%20Chandigarh!5e0!3m2!1sen!2sin!4v1622478834190!5m2!1sen!2sin" width="100%" height="450" style="border:0;margin-top:100px;" allowfullscreen="" loading="lazy">
</iframe>

<div class="border" style="margin-top:100px;height:210px;background-color:black;">
<div style="margin-top:50px;margin-left:100px;display:flex;">
<a href="../booking/buses2.php" id="down_links">Book</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../offers/offers.php" id="down_links" >Offers</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../routes/routes.php" id="down_links" >Routes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://www.google.com/maps/" id="down_links" >Maps</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div style="margin-top:10px;margin-left:100px;display:flex;">
<a href="../destination/chandigarh.php" id="down_links" >Chandigarh</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../destination/bathinda.php" id="down_links" >Bathinda</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../destination/kolkata.php" id="down_links" >Kolkata</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../destination/bangalore.php" id="down_links" >Bangalore</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div style="margin-top:10px;margin-left:100px;display:flex;">
<a href="../services/services.php" id="down_links">Services</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://services.india.gov.in/service/detail/apply-online-for-travel-trade-recognition-1" id="down_links" >Govt. Recogonisation</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../help/help.php" id="down_links" >Help</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../faq/faq.php" id="down_links" >FAQs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>

<img src="../images/bus1.png" style="width:50px;height:50px;margin-left:1000px;margin-top:-130px;">

<div style="width:100px;height:50px;margin-left:1100px;margin-top:-190px;font-size:10px;color:white;">

<p>CrossRoads is the world's largest online bus ticket booking service trusted by over 25 million happy customers globally.</p>

<a href="https://www.facebook.com/"><img src="../images/fb.jpg" style="width:30px;height:30px;margin-top:10px;"></a>
<a href="https://www.twitter.com/"><img src="../images/twitter.png" style="width:30px;height:30px;margin-top:10px;margin-left:20px;"></a>

<img src="../images/cw.jpg" style="width:15px;height:15px;margin-top:10px;">
<p style="color:white;font-size:8.5px;margin-left:20px;margin-top:-15px;width:220px;">Copyright 2021-Crossroads.All rights Reserved.|Designed at GGDSD College,Sec-32-C,Chandigarh-160047</p>

</div>

</body>
</html>