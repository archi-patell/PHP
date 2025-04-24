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
    </style>
</head>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "watch_databse");
    if (isset($_POST['submit'])) {

        if (!empty($_POST['mail']) && !empty($_POST['pwd']) && !empty($_POST['cpwd'])) {
            $email = $_POST['mail'];
            $cpwd = $_POST['cpwd'];
            $qry = mysqli_query($con, "UPDATE `user_details` SET `password`='{$cpwd}' WHERE `email`='{$email}'");

            echo "<script>alert('Your Password successfully Updated.');
                    window.location.href='login.php';
                    </script>";
        } else {
            echo "<script>alert('please Insert all the required data.')</script>";
        }
    }
    ?>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 bg-light p-4 border rounded">
                <form action="#" method="post">
                    <h4 class="bg-dark text-center text-light p-3">Forgot Password</h4>
                    <div class="form-group">
                        <label for="mail">Email Id:</label>
                        <input type="email" name="mail" id="mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Reset Password:</label>
                        <input type="password" name="pwd" id="pwd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cpwd">Confirm Password:</label>
                        <input type="password" name="cpwd" id="cpwd" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg form-control">
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>