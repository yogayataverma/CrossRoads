<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/14cfb2d6a9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../scrollbar/scrollbar.css">
link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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

<div style="margin-top:-30px;height:500px;"><?php include("C:/xampp1/htdocs/web1/bus_main/navbar/navbar.html") ?></div>
<div class="wrapper">
<div class="sidebar border" style="background-color:white;width:250px;height:100%;bottom:0;top:0;position:fixed;overflow-x:scroll;">
<form method="POST" action="filter.php" style="margin-top:150px;margin-left:100px;">
<label class="text-muted">Type</label><hr style="margin-left:-50px;margin-top:-4px;">
<input type="radio" name="type" value="public" style="margin-left:-10px;">&nbsp;Public
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
$conn=mysqli_connect("localhost","root","","bus");
$query = "SELECT * FROM bus_arrival";
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{
echo '<div class="card" style="width:75%;margin-top:100px;border-style:none;margin-left:300px;border-style:solid;overflow-x: hidden;">
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
      <td style="border-style:none;"><button class="btn btn-info">'.$row["rating"].'</button></td>
      <td style="border-style:none;">'.$row["fare"].'</td>
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
     <a href="buses2.php" class="btn btn-danger" style="margin-left:850px;">VIEW SEATS</a>
    
     <a href="#ami" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Aminities</a>
     <div id="ami" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="ami" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#photo" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Bus Photos</a>
     <div id="photo" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="photo" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#board" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Boarding Pass</a>
     <div id="board" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="board" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>
     <br>
     <a href="#rev" class="extra_links text-danger" data-toggle="collapse" style="border-style:none;background-color:white;">Reviews</a>
     <div id="rev" class="collapse bg-danger" style="margin-left:-35px;margin-right:-35px;margin-bottom:-20px;color:white;padding-left:10px;">
     <div class="container" id="rev" class="collapse bg-dark" >'.$row["ami"].'</div>
     </div>

     </div>
     </div>
     </div>
     </div>
     </div>
     </div>';
}
?>
</body>
</html>