<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "watch_databse");
if (isset($_POST['submit'])) {
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['pwd'] = $_POST['pwd'];
    $sql = "select * from user_details where email='{$_SESSION['mail']}'";
    $qry = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($qry);
    if ($_POST['mail'] == "" && $_POST['pwd'] == "") {
        echo "<script>alert('Please Enter Email id and Password.');</script>";
    } elseif ($_SESSION['mail'] == 'admin@gmail.com' && $_SESSION['pwd'] == 'admin') {
        echo "<script>window.location.href='admindashboard.php';</script>";
    } elseif ($_SESSION['mail'] == $row['email'] && $_SESSION['pwd'] == $row['password']) {
        echo "<script>window.location.href='user_panel.php';</script>";
    } else {
        echo "<script>alert('Enter valid Email id and Password.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .fluid-container .row .col-sm-4 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* .fluid-container .row .col-sm-4 form {
            padding: 10px; 
        } */

        .fluid-container .row .col-sm-4 form h4 {
            text-align: center;
            /* background-color: rgb(59, 59, 59); */
            color: white;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 bg-light p-4 border rounded">
                <form action="#" method="post">
                    <h4 class="bg-dark text-light text-center p-3">LogIn</h4>
                    <div class="form-group">
                        <label for="mail">Email Id:</label>
                        <input type="email" name="mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwd" class="form-control">
                        <a href="forgot_password.php">forgot_password</a>

                    </div>
                    <input type="submit" name="submit" value="LogIn" class="btn btn-primary btn-lg form-control">

                    <p>Not a member?<a href="user_registration.php">SignUp Now</a></p>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>