<?php
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from bus_arrival";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
   if($row["rating"]<1.0)
    {
      echo "<button class='btn btn-warning' >".$row["rating"]."</button>";
    }
   if($row["rating"]>1.0 && $row["rating"]<3.0)
    {
      echo "<button class='btn btn-success' >".$row["rating"]."</button>";
    }
    if($row["rating"]>3.0 && $row["rating"]<5.0)
    {
      echo "<button class='btn btn-danger' >".$row["rating"]."</button>";
    }
}

?>