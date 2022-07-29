<?php
$con=mysqli_connect("localhost","root","","bus");
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid">
<div class="row">
<br>
<div class="col">
<div class="list-group">
<h3>Price</h3>
<hr>
<h6>select fare</h6>
<ul class="list-group">
<?php 
$sql="select distinct fare from bus_arrival order by fare";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

echo '<li class="list_group-item">';
echo '<div class="form-check">';
echo '<label class="form-check-label">';
echo '<input type="checkbox" class="form-check product_check" value="$row["fare"]" id="fare">'.$row["fare"].'</label>
</div>
</li>';
} 
?>
</ul>


<div class="list-group">
<h3>Destination Place</h3>
<hr>
<h6>select destination</h6>
<ul class="list-group">
<?php 
$sql="select distinct dep_time from bus_arrival order by dep_time";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
echo '<li class="list_group-item">';
echo '<div class="form-check">';
echo '<label class="form-check-label">';
echo '<input type="checkbox" class="form-check product_check" value="$row["dep_time"]" id="dep_time">'.$row["dep_time"].'</label>
</div>
</li>';
} 
?>
</ul>
</div>

<div class="col-9">
<h5>All products</h5>
<div class="row" id="result">
<?php
$sql="select * from bus_arrival";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
echo'<div>
<div class="card">
'.$row["name"].'</div>
</div>';
}

?>
</div>
</div>

<script type="text/javascript">
$(document).ready( function()
{

 $(".product_check").click( function () {
    var action='data';
    var fare=get_filter_text('fare');
    var dep_time=get_filter_text('dep_time');


$.ajax({ 
url:'action.php',
method:'POST',
data:{action:action,fare:fare,dep_time:dep_time},
success:function(response)
{
$("#result").html(response);
}

});

});
   

 function get_filter_text(text_id){
  var filterData=[];
  $('#'+text_id+':checked').each(function()
{
filterData.push($(this).val());
});
return filterData;
}
});
</script>

</body>
</html>