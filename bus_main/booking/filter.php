<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/14cfb2d6a9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../scrollbar/scrollbar.css">
<style>
hr
{
  margin-top: 1px;
  margin-bottom: px;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  width:100%;
}

tr
{
border-style:solid;
}

td
{
color:grey;
}

.extra_links:hover
{
animation: animate 2s linear forwards;
text-decoration:none;
}

@keyframes animate {
             0% {opacity: 0;}
             100% {opacity: 1;}

.extra_links
{
text-decoration:none;
}

}

</style>
</head>
<body class="bg-light">

<div style="margin-top:-10px;" class=" sticky-top "><?php  include("C:/xampp1/htdocs/web1/bus_main/navbar/navbar.html"); ?></div>
<div class="wrapper">
<div class="sidebar border" style="background-color:white;width:250px;height:100%;bottom:0;top:0;position:fixed;overflow-x: scroll;">
<form method="POST" style="margin-top:150px;margin-left:100px;">
<label class="text-muted">Type</label>
<hr style="margin-left:-50px;margin-top:-4px;">
<input type="radio" name="type" value="public" style="margin-left:-10px;margin-top:-25px;">&nbsp;Public
<br>
<input type="radio" name="type" value="private" style="margin-left:-10px;">&nbsp;Private
<br>
<br>
<label class="text-muted">Price</label><hr style="margin-left:-50px;margin-top:-4px;">
<input type="checkbox" name="allfare" style="margin-left:-10px;">&nbsp;All
<br>
<input type="checkbox" name="fare500" style="margin-left:-10px;">&nbsp;500-700
<br>
<input type="checkbox" name="fare700" style="margin-left:-10px;">&nbsp;700-900
<br>
<input type="checkbox" name="fare900" style="margin-left:-10px;">&nbsp;900-1000
<br>
<br>
<label class="text-muted" style="margin-left:-30px;">Deprature Place</label><hr style="margin-left:-50px;margin-top:-4px;">
<input type="checkbox" name="alldeplace" style="margin-left:-10px;">&nbsp;All
<br>
<input type="checkbox" name="chandigarh" style="margin-left:-10px;">&nbsp;Chandigarh
<br>
<input type="checkbox" name="bathinda" style="margin-left:-10px;">&nbsp;Bathinda
<br>
<input type="checkbox" name="kolkata" style="margin-left:-10px;">&nbsp;Kolkata
<br>
<input type="checkbox" name="bangalore" style="margin-left:-10px;">&nbsp;Bangalore
<br>
<br>
<label class="text-muted" style="margin-left:-30px;">Deprature Time</label><hr style="margin-left:-50px;margin-top:-4px;">
<input type="checkbox" name="8am" style="margin-left:-10px;">&nbsp;8AM
<br>
<input type="checkbox" name="12pm" style="margin-left:-10px;">&nbsp;12PM
<br>
<input type="checkbox" name="6pm" style="margin-left:-10px;">&nbsp;6PM
<br>
<br>



<input type="submit" name="sub" value="Filter" class="btn btn-danger" style="margin-left:-10px;">

</form>

</div>
</div>



<?php
$con=mysqli_connect("localhost","root","","bus");

$sql="select * from bus_arrival";

$result=mysqli_query($con,$sql);

if(isset($_POST['sub']))
{

if( !empty($_POST["allfare"]) && empty($_POST["fare500"]) && empty($_POST["fare700"]) && empty($_POST["fare900"]))
{
$sql="select * from bus_arrival WHERE fare BETWEEN 500 AND 700
      UNION ALL
      select * from bus_arrival WHERE fare BETWEEN 700 AND 900
      UNION ALL
      select * from bus_arrival WHERE fare BETWEEN 900 AND 1000";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
     echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( empty($_POST["allfare"]) && !empty($_POST["fare500"]) && empty($_POST["fare700"]) && empty($_POST["fare900"])) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 500 AND 700;";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
    echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["allfare"]) && empty($_POST["fare500"]) && empty($_POST["fare900"]) && !empty($_POST["fare700"]) ) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 700 AND 900;";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
      echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}



if(empty($_POST["allfare"]) && empty($_POST["fare500"]) && !empty($_POST["fare900"]) && empty($_POST["fare700"]) ) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 900 AND 1000;";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
     echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}


if( empty($_POST["allfare"]) && !empty($_POST["fare500"]) && !empty($_POST["fare900"]) && empty($_POST["fare700"]) ) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 900 AND 1000
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 700";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( empty($_POST["allfare"]) && !empty($_POST["fare500"]) && empty($_POST["fare900"]) && !empty($_POST["fare700"]) ) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 700 AND 900
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 700";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["allfare"]) && empty($_POST["fare500"]) && !empty($_POST["fare900"]) && !empty($_POST["fare700"]) ) 
{
  $sql="select * from bus_arrival WHERE fare BETWEEN 700 AND 900
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 900 AND 1000";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if(isset($_POST["type"]))
{
if($_POST["type"]=="public")
{
$sql="select * from bus_arrival WHERE type='public'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
    echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}



if(isset($_POST["type"]))
{
if($_POST["type"]=="private")
{
$sql="select * from bus_arrival WHERE type='private'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
    echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}


if( empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
   echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( !empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}


if( empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( !empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';


  }
exit;
}

if( !empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';


  }
exit;
}

if( !empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( !empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( !empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Chandigarh'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
     
    echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["chandigarh"]) && !empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Bathinda'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && !empty($_POST["kolkata"]) && empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='kolkata'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( empty($_POST["chandigarh"]) && empty($_POST["bathinda"]) && empty($_POST["kolkata"]) && !empty($_POST["bangalore"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}


if( !empty($_POST["8am"]) && empty($_POST["12pm"]) && empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='08:00AM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( empty($_POST["8am"]) && empty($_POST["12pm"]) && !empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='06:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';


  }
exit;
}

if( empty($_POST["8am"]) && !empty($_POST["12pm"]) && empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='12:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}


if( !empty($_POST["8am"]) && empty($_POST["12pm"]) && !empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='06:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( !empty($_POST["8am"]) && !empty($_POST["12pm"]) && empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='12:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
   echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

if( empty($_POST["8am"]) && !empty($_POST["12pm"]) && !empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='12:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='06:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}


if( empty($_POST["8am"]) && !empty($_POST["12pm"]) && !empty($_POST["6pm"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_time='12:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='06:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( !empty($_POST["alldeplace"]) ) 
{
  $sql="select * from bus_arrival WHERE dep_city='Kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

if( isset($_POST['type']) && !empty($_POST['fare500']) )
{
if($_POST['type']="public")
{
$sql="select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 700";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}



if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) )
{
if($_POST['type']="public")
{
$sql="select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 700
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 700 AND 900";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) )
{
if($_POST['type']="public")
{
$sql="select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 700
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 700 AND 900
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 900 AND 1000";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';


  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) )
{
if($_POST['type']="public")
{
$sql="select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}



if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) )
{
if($_POST['type']="public")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
    echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}

if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) )
{
if($_POST['type']="public")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';


  }
exit;
}

}

if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) )
{
if($_POST['type']="public")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}

if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) && !empty($_POST['8am']) && !empty($_POST['12pm']) )
{
if($_POST['type']="public")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='12:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) && !empty($_POST['8am']) && !empty($_POST['12pm']) && !empty($_POST['6pm']) )
{
if($_POST['type']="public")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='12:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='06:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) && !empty($_POST['8am']) && !empty($_POST['12pm']) && !empty($_POST['6pm']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='12:00PM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='06:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}

if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) && !empty($_POST['8am']) && !empty($_POST['12pm']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'
        UNION ALL
        select * from bus_arrival WHERE dep_time='12:00PM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}

if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) && !empty($_POST['8am']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'
        UNION ALL
        select * from bus_arrival WHERE dep_time='08:00AM'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) && !empty($_POST['kolkata']) && !empty($_POST['bangalore']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bangalore'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}



if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'
        UNION ALL
        select * from bus_arrival WHERE dep_city='kolkata'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';

  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) && !empty($_POST['bathinda']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Bathinda'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Private'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
  echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}


if( isset($_POST['type']) && !empty($_POST['fare500']) && !empty($_POST['fare700']) &&!empty($_POST['fare900']) && !empty($_POST['chandigarh']) )
{
if($_POST['type']="private")
{
$sql="  select * from bus_arrival WHERE fare BETWEEN 500 AND 1000
        UNION ALL
        select * from bus_arrival WHERE type='Public'
        UNION ALL
        select * from bus_arrival WHERE dep_city='Chandigarh'";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

}



}
else
{

  $sql="  select * from bus_arrival";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
  {
         
 echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;overflow-y:hidden;">
     <div class="card-body">
     <table class="table">
     <thead>
     <tr style="border-style:solid;border-width:1px;border-left:none;border-right:none;">
      <td><h6 style="font-family:Bradley Hand, cursive">'.$row["name"].'</h6></td>
      <td style="font-family:Bradley Hand, cursive">Departure</td>
      <td style="font-family:Bradley Hand, cursive">Duration</td>
      <td style="font-family:Bradley Hand, cursive">Arrival</td>
      <td style="font-family:Bradley Hand, cursive">Ratings</td>
      <td style="font-family:Bradley Hand, cursive">Fare</td>
     </tr>
     </thead>
     <tbody>
     <tr style="border-style:none;">
      <td style="border-style:none;font-size:14px;">'.$row["desci"].'</td>
      <td style="border-style:none;">'.$row["dep_time"].'</td>
      <td style="border-style:none;">'.$row["duration"].'</td>
      <td style="border-style:none;">'.$row["arrival"].'</td>
      <td style="border-style:none;"><button class="btn btn-danger">'.$row["rating"].'</button></td>
      <td style="border-style:none;" id="price_supply">'.$row["fare"].'</td>
     </tr>
     <tr style="border-style:none;">
     <td style="border-style:none;">'.$row["fac"].'</td>
     <td style="border-style:none;font-size:13px;">'.$row["dep_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;font-size:13px;">'.$row["arrival_place"].'</td>
     <td style="border-style:none;"></td>
     <td style="border-style:none;"></td>
     </tr>
     </tbody>
     </table>
     <form method="POST" action="'.$row["class_file"].'">
     <input type="submit" class="btn btn-danger" style="margin-left:850px;margin-top:-40px;" name="get_price" value="VIEW SEATS">
     <input type="hidden" name="price"  value="'.$row["fare"].'" >
     </form>
      <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" ><div style="display:flex;"><img style="height:500px;width:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/><img style="height:500px;" src="data:image/jpeg;base64,'.base64_encode( $row['img1'] ).'"/></div></div>
     </div>
     <br>


     <a type="link" class="text-danger" data-toggle="modal" data-target="#myModal">Boarding Pass</button>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board1.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board2.jpg"/>
    </div>
    <div class="carousel-item">
      <img style="height:694px;width:500px; class="d-block w-100" src="../images/board3.jpg"/>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
     <br>
      
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
  }
exit;
}

?>
</body>
</html>