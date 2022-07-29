<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php

if( date("h:i:sa") > "09:00:00am" )
{

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top" style="margin-top:5px;">';

}

if( date("h:i:sa") > "09:32:00am" )
{
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="margin-top:5px;">';

}

?>


  <a class="navbar-brand" href="#"><img src="../images/logo2.png" style="width:180px;height:100px;border-radius:5px;"></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="buses2.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:white;">Offers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:white;">Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color:white;">Help</a>
      </li>
       
        


        <li class="nav-item dropdown" style="margin-left:690px;">
        <a type="button" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Services</a>
          <a class="dropdown-item" href="#">Buses</a>
          <a class="dropdown-item" href="#">Volvo</a>
        </div>
        </li>

</nav>
</body>
</html>