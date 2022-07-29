<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/14cfb2d6a9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../scrollbar/scrollbar.css">

<style>
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}

.rate:not(:checked) > label:hover ~ label {
    color: #deb21;  
}
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>

</head>
<body>

<?php include("../navbar/navbar.html"); ?>


<form  method="POST" action="review1.php" class="border" style="margin-bottom:100px;;margin-top:100px;margin-left:215px;width:930px;height:450px;background-image:url('../images/revform.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">

   <label style="margin-top:50px;margin-left:200px;">Star Rating</label>
   <div class="form-group" style="margin-top:0px;margin-left:185px;">
   <ul style="List-style:none;display:flex;">
    <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
    </div>
   </ul>
   </div>

   <div class="form-group">
    <label style="margin-top:0px;margin-left:200px;">Bus Name</label><br>
    <select name="bus" style="margin-left:200px;">
    <?php
    $con=mysqli_connect("localhost","root","","bus");
    $sql="select * from bus_arrival";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result))
    {
    echo '
    <option value="'.$row["name"].'">'.$row["name"].'</option>';
    }
    ?>
    </select>
    </div>

    <div class="form-group">
    <label style="margin-top:0px;margin-left:200px;">Comments</label><br>
    <textarea  name="com" rows=5 cols=50 style="margin-top:0px;margin-left:200px;"></textarea>
    </div>

    <input type="submit" name="review" class="btn btn-danger" value="Submit" style="margin-top:0px;margin-left:200px;">
</form>













<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from review";
$result=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($result);
$row=mysqli_num_rows($result);
echo '<div class="card" style="margin-left:200px;width:70%;margin-top:100px;height:50%;margin-bottom:100px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../images/reviewback.jpg" class="card-img" alt="..." style="height:298px;position:relative;">
     <h3><p style="position:absolute;margin-top:-300px;margin-left:100px;" class=" text-danger">Overview</p></h3>
     <a href="#rev" class=" btn btn-danger" style="margin-top:-55px;position:absolute;margin-left:100px;">Submit Yours</a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$row.'   People Reviewed</h5>
        <p class="card-text">We Are Here To Listen To Your Problems And Rectify Our Drawbacks.</p>
        <p class="card-text"><small class="text-muted">'.$row1["time"].'</small></p>
      </div>
    </div>
  </div>
</div>';

?>










<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from review";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
echo '<div class="card" style="width:940px;margin-left:210px;">
  <div class="card-header">
    Review '.$row["id"].'
  </div>
  <ul class="list-group ">
    <li class="list-group-item">'.$row["star"].'</li>
    <li class="list-group-item">'.$row["bus"].'</li>
    <li class="list-group-item">'.$row["com"].'</li>
  </ul>
</div>';

}
?>






</body>
</html>