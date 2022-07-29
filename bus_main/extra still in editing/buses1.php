<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/14cfb2d6a9.js" crossorigin="anonymous"></script>

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

</style>
</head>
<body>
<div class="card" style="width: 100%;margin-top:10px;">
<div class="card-body">
<?php
$conn=mysqli_connect("localhost","root","","bus");
$query = "SELECT * FROM bus_arrival";
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{
    echo '<table class="table">
    <tr style="border-style:solid;">
    <th><h6 class="card-title">'.$row["name"].'</h6></th>
    <th><p  style="margin-left:180px;margin-top:0px;color:grey;">Departure</p></th>
    <th><p  style="margin-left:180px;margin-top:0px;color:grey;">Duration</p></th>
    <th><p  style="margin-left:180px;margin-top:0px;color:grey;">Arrival</p></th>
    <th><p  style="margin-left:180px;margin-top:0px;color:grey;">Rating</p></th>
    <th><p  style="margin-left:180px;margin-top:0px;color:grey;">Fare</p></th>
    </div>';
    echo'</tr>
    <tbody>';
    echo '<div style="display: flex;">
    <div style="width:200px;height:100px;border-style:solid;"><p class="card-text" style="font-size:12px;color:grey;font-family:Apple Chancery, cursive;">'.$row["desci"].'</p></div>
    <p class="card-text" style="margin-left:70px;margin-top:0px;position:relative;color:grey;">'.$row["dep_time"].'</p>
    <p class="card-text" style="margin-left:190px;margin-top:0px;color:grey;">'.$row["duration"].'</p>
    <p class="card-text" style="margin-left:175px;margin-top:0px;color:grey;">'.$row["arrival"].'</p>
    <p class="card-text" style="margin-left:185px;margin-top:0px;color:grey;">'.$row["rating"].'</p>
    <p class="card-text" style="margin-left:180px;margin-top:0px;color:grey;">'.$row["fare"].'</p>
    </div>';
    echo '<div style="display: flex;">';
    echo'<p class="card-text" style="color:grey;">'.$row["fac"].'</p>';
    echo '<p class="card-text" style="margin-left:250px;margin-top:0px;color:grey">'.$row["dep_place"].'</p>
    <p class="card-text" style="margin-left:380px;margin-top:0px;color:grey;">'.$row["arrival_place"].'</p>
    </tbody></div>';    
    echo '<a href="#" class="btn btn-danger">VIEW SEATS</a>';
    echo '<br><br><hr/>';
} 
?>
</div>
</div>
</body>
</html>