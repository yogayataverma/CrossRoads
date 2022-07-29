<?php
$file=$_GET["file"];
header("content-disposition:attachment;file=".urlencode($file));
$fb=fopen($file,"r");
while(!feof($fb))
{
echo fread($fb,8192);
flush();
}
fclose($fb);
?>