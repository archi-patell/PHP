<?php
session_start();
if (!isset($_SESSION['mail']) && !isset($_SESSION['pwd'])) {
    echo "<script>window.location.href='login.php';</script>";
}

$con = mysqli_connect("localhost", "root", "", "flower_database");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.js"></script>
</head>

<body>

</body>

</html>