<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>
<body>

<main id="cart-main">
    <div class="site-title text-center">
        <div><img src="checked.jpeg" alt=""></div>
        <h1 class="font-title">Payment Done Successfully...!</h1>
    </div>
</main>

<?php 
echo "<script>alert('Payment Done!!!!!!')</script>";
echo "<script>window.location.replace('buses2.php')</script>";
 ?>
</body>
</html>