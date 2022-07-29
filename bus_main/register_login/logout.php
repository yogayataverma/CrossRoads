<?php
session_start();
session_destroy();
echo "<script>alert('Logged Out')</script>";
echo "<script>window.location.replace('login.html')</script>";
?>