<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../scrollbar/scrollbar.css">
</head>
<body>
<?php include("../navbar/navbar.html"); ?>
<div style="width:100%;color:black;height:200px;">
<img src="../images/backoff.jpg" style="width:100%;height:500px;">
<p style="margin-left:450px;font-size:50;margin-top:-300px;position:absolute;">Offers Active For Today</p>
</div>

<div style="width:100%;color:black;height:200px;margin-top:300px;">
<img src="../images/backoff1.jpg" style="width:100%;height:500px;">
</div>

<div style="width:100%;color:black;height:200px;margin-top:300px;">
<img src="../images/backoff3.jpg" style="width:100%;height:500px;">
</div>

<div style="width:100%;color:black;height:200px;margin-top:300px;">
<img src="../images/backoff2.jpg" style="width:100%;height:500px;">
</div>

<div class="container">
<div class="row" style="margin-left:20px;position:relative;margin-top:-1180px;">

<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from offers where id=1";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

echo "<div style='margin-left:10px;'>
<div class='card' style='height:470px;width:400px;'>
  <img style='background-color:black;' class='card-img-top' alt='Card image cap' src='data:image/jpeg;base64,".base64_encode( $row['img'] )."'/ >
  <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    ".$row['content']."<br><br>
    <form method='POST' action='off.php' >
    <button class='btn btn-danger' name='off'>Choose</button>
     <input type='hidden' name='off1' value='".$row["id"]."'/>
    </form>
  </div>
</div>
</div>";


$sql1="select * from offers where id=3";
$result=mysqli_query($con,$sql1);
$row=mysqli_fetch_array($result);

echo "<div style='margin-left:25px;margin-top:500px;'>
<div class='card' style='height:470px;width:400px;'>
  <img style='background-color:black;' class='card-img-top' alt='Card image cap' src='data:image/jpeg;base64,".base64_encode( $row['img'] )."'/ >
  <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    ".$row['content']."<br><br>
    <form method='POST' action='off.php' >
    <button class='btn btn-danger' name='off'>Choose</button>
     <input type='hidden' name='off1' value='".$row["id"]."'/>
    </form>
  </div>
</div>
</div>";


$sql1="select * from offers where id=2";
$result=mysqli_query($con,$sql1);
$row=mysqli_fetch_array($result);

echo "<div style='margin-left:850px;margin-top:20px;'>
<div class='card' style='height:470px;width:360px;'>
  <img style='background-color:black;' class='card-img-top' alt='Card image cap' src='data:image/jpeg;base64,".base64_encode( $row['img'] )."'/ >
  <div class='card-body'>
    <h5 class='card-title'>".$row["name"]."</h5>
    ".$row['content']."<br><br>
    <form method='POST' action='off.php' >
    <button class='btn btn-danger' name='off'>Choose</button>
     <input type='hidden' name='off1' value='".$row["id"]."'/>
    </form>
  </div>
</div>
</div>";
?>
</div>
</div>
</div>
</div>
</body>
</html>