<?php
if(isset($_POST["fet_p"]))
{

$name=$_POST["name1"];
$email=$_POST["email1"];
$con=mysqli_connect("localhost","root","","bus");
$sql="select * from pass where name='$name' AND email='$email'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

$date = date('m/d/Y h:i:s a', time());

require("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont("Arial","",9);
$pdf->Image('../images/logo2.png',10,10,190,-250);
$pdf->Ln(50);
$pdf -> Cell(0,10,"Ticket Details",1,1,'C');
$pdf -> Cell(30,10,"Ticket No",1,0);
$pdf -> Cell(32,10,"Name",1,0);
$pdf -> Cell(17,10,"No of Pass.",1,0);
$pdf -> Cell(18,10," No of Child. ",1,0);
$pdf -> Cell(25,10," Bus ",1,0);
$pdf -> Cell(30,10," Dep. Time ",1,0);
$pdf -> Cell(25,10," Dep. Place ",1,0);
$pdf -> Cell(0,10," Seat No",1,1);


$pdf -> Cell(30,20,$row["ticket_no"],1,0);
$pdf -> Cell(32,20,$row["name"],1,0);
$pdf -> Cell(17,20,$row["pas"],1,0);
$pdf -> Cell(18,20,$row["noc"],1,0);
$pdf -> Cell(25,20,$row["name_bus"],1,0);
$pdf -> Cell(30,20,$row["dep_time"],1,0);
$pdf -> Cell(25,20,$row["dep_place"],1,0);
$pdf -> Cell(0,20,$row["seatno"],1,1);

$pdf->Ln(10);

$pdf -> Cell(36,20,"$date","L",1,0);
$pdf -> Cell(0,20,"Happy Journey with Us","L",1,1);

$file=time().'.pdf';

$pdf-> output($file,'D');


echo '<div class="container" style="position:relative;margin-top:100px;">
<img src="../images/ticketbackground.jpg">
<div style="position:absolute;margin-top:-250px;margin-left:450px;">'.$row["ticket_no"].'</div>
<div style="position:absolute;margin-top:-230px;margin-left:450px;">'.$row["name"].'</div>
<div style="position:absolute;margin-top:-210px;margin-left:450px;">'.$row["pas"].'</div>
<div style="position:absolute;margin-top:-190px;margin-left:450px;">'.$row["food"].'</div>
<div style="position:absolute;margin-top:-170px;margin-left:450px;">'.$row["noc"].'</div>
<div style="position:absolute;margin-top:-150px;margin-left:450px;">'.$row["fac"].'</div>
<div style="position:absolute;margin-top:-250px;margin-left:700px;">'.$row["name_bus"].'</div>
<div style="position:absolute;margin-top:-230px;margin-left:700px;">'.$row["dep_time"].'</div>
<div style="position:absolute;margin-top:-210px;margin-left:700px;">'.$row["dep_place"].'</div>
</div>';


}
?>