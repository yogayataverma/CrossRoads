<?php
if(isset($_POST['off']))
{
  $off = $_POST['off1'];
   $SESSION['offer']=$off;
   echo $SESSION['offer'];
}

?>