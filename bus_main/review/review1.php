<?php
$con=mysqli_connect("localhost","root","","bus");
if(isset($_POST["review"]))
{
if($_POST["rate"]=="5")
{
$com=$_POST["com"];
$bus=$_POST["bus"];
$sql1="insert into review(star,com,bus)values('5 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);

}
}



if(isset($_POST["review"]))
{
if($_POST["rate"]=="5")
{
$com=$_POST["com"];
$sql1="insert into review(star,com)values('5 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="4")
{
$com=$_POST["com"];
$sql1="insert into review(star,com)values('4 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="3")
{
$com=$_POST["com"];
$sql1="insert into review(star,com)values('3 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="2")
{
$com=$_POST["com"];
$sql1="insert into review(star,com)values('2 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="1")
{
$com=$_POST["com"];
$sql1="insert into review(star,com)values('1 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="1")
{
$com=$_POST["bus"];
$sql1="insert into review(star,bus)values('1 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="2")
{
$com=$_POST["bus"];
$sql1="insert into review(star,bus)values('2 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="3")
{
$com=$_POST["bus"];
$sql1="insert into review(star,bus)values('3 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="4")
{
$com=$_POST["bus"];
$sql1="insert into review(star,com)values('4 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="5")
{
$com=$_POST["bus"];
$sql1="insert into review(star,com)values('5 Star','$com')";
$result=mysqli_query($con,$sql1);

}
}



if(isset($_POST["review"]))
{
$bus=$_POST["bus"];
$com=$_POST["com"];
$sql1="insert into review(bus,com)values('$bus','$com')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="5")
{
$sql1="insert into review(star)values('5 Star')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="4")
{
$sql1="insert into review(star)values('4 Star')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="3")
{
$sql1="insert into review(star)values('3 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="2")
{
$sql1="insert into review(star)values('2 Star')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="1")
{
$sql1="insert into review(star)values('5 Star')";
$result=mysqli_query($con,$sql1);

}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="4")
{
$com=$_POST["com"];
$bus=$_POST["bus"];
$sql1="insert into review(star,com)values('4 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);
}
}

if(isset($_POST["review"]))
{
if($_POST["rate"]=="3")
{
$com=$_POST["com"];
$bus=$_POST["bus"];
$sql1="insert into review(star,com)values('3 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);
}
}


if(isset($_POST["review"]))
{
if($_POST["rate"]=="2")
{
$com=$_POST["com"];
$bus=$_POST["bus"];
$sql1="insert into review(star,com)values('2 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);
}
}



if(isset($_POST["review"]))
{
if($_POST["rate"]=="1")
{
$com=$_POST["com"];
$bus=$_POST["bus"];
$sql1="insert into review(star,com)values('1 Star','$com','$bus')";
$result=mysqli_query($con,$sql1);
}
}


echo "<script>alert('Review Submitted!!!!!!!')</script>";
echo "<script>window.location.replace('review.php')</script>";
?>