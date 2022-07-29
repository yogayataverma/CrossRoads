
$sql1="select * from seat where id=1";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1))
{
if($row1["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:500px;'>
</button>
<input type='hidden' name='seatno' value='".$row1["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:500px;' id='".$row1["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row1["id"]."'>
</form>
<br>";
}

}




$sql2="select * from seat where id=2";
$result=mysqli_query($con,$sql2);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:500px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:500px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=3";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:600px;margin-top:-147px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:600px;margin-top:-177px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=4";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:600px;margin-top:-96px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:600px;margin-top:-129px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=5";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:700px;margin-top:-195px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:700px;margin-top:-255px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=6";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:700px;margin-top:-145px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:700px;margin-top:-205px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=7";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:800px;margin-top:-245px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:800px;margin-top:-335px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}

$sql="select * from seat where id=8";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:800px;margin-top:-192px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:800px;margin-top:-285px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=9";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:900px;margin-top:-295px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:900px;margin-top:-415px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}


$sql="select * from seat where id=10";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
if($row["status"]==0)
{
echo "<form method='POST' action='seatcode.php'>
<button name='grey' class='seat' style='height:50px;width:50px;background-color:grey;margin-left:900px;margin-top:-240px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
<form>
<br>
<br>";
}
else
{
echo "<form method='POST' action='seatcode.php'>
<button name='black' class='seat' style='height:50px;width:50px;background-color:black;margin-left:900px;margin-top:-365px;' id='".$row["id"]."'>
</button>
<input type='hidden' name='seatno' value='".$row["id"]."'>
</form>
<br>";
}

}

