<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../scrollbar/scrollbar.css">
</head>
<body>
<?php include("../navbar/navbar.html"); ?>
<div class="container">
<p style="margin-left:300px;font-size:50;margin-top:60px;">Offers Active For Today</p>
<div class="row" style="margin-left:50px;margin-bottom:50px;margin-top:50px;">
<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from offers";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

echo "<div style='display:flex;' >
<div class='card' style='width:20rem;margin-left:15px;'>
  <img class='card-img-top' alt='Card image cap' src='data:image/jpeg;base64,".base64_encode( $row['img'] )."'/ >
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

}
?>
</div>
</div>
</body>
</html>