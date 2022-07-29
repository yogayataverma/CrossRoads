<?php
session_start();

if(isset($_POST['button1']))
{
if(isset($_POST['grey']))
{
$seatno=$_POST["seatno1"];
echo $seatno;
}

if(isset($_POST['black']))
{
$seatno=$_POST["seatno1"];
echo $seatno;
}

}


if(isset($_POST['button2']))
{
if(isset($_POST['grey']))
{
$seatno=$_POST["seatno2"];
echo $seatno;
}

if(isset($_POST['black']))
{
$seatno=$_POST["seatno2"];
echo $seatno;
}

}
?>