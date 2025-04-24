<?php
session_start();
unset($_SESSION['mail']);
unset($_SESSION['pwd']);
echo "<script>window.location.href='login.php';</script>";
?>