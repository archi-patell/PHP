<?php
$con = mysqli_connect("localhost", "root", "", "flower_database");

if (isset($_POST['submit'])) {

    if (!empty($_POST['uname']) && !empty($_POST['add']) && !empty($_POST['mno']) && !empty($_POST['email']) && !empty($_POST['city'])) {
        $uname = $_POST['uname'];
        $add = $_POST['add'];
        $mno = $_POST['mno'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $pwd = $_POST['pwd'];
        $img = $_FILES['img']['name'];
        move_uploaded_file($img, "upload_img/$img");
        $qry = mysqli_query($con, "INSERT INTO `user_details`(`user_name`, `address`, `mobile_no`, `email`, `password`, `city`, `photo`) VALUES ('{$uname}','{$add}','{$mno}','{$email}','{$pwd}','{$city}','{$img}')");
        echo "<script>alert('Your Data successfully Registered.');
            window.location.href='login.php';
            </script>";
    } else {
        echo "<script>alert('Please Insert all the required data.')</script>";
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
        .fluid-container .row .col-sm-8 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .fluid-container .row .col-sm-8 form {
            border: 1px solid rgb(0, 0, 0);
            padding: 10px;
        }

        .fluid-container .row .col-sm-8 form h4 {
            text-align: center;
            background-color: rgb(59, 59, 59);
            color: white;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form action="#" method="post" name="form" enctype="multipart/form-data" require>
                    <h4>User Registration</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="uname">User Name : </label>
                                <input type="text" name="uname" id="uname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="add">Address : </label>
                                <input type="text" name="add" id="add" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="mno">Mobile No. : </label>
                                <input type="number" name="mno" id="mno" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="city">City : </label>
                                <select name="city" id="city" class="form-control">
                                    <option value=""></option>
                                    <option value="Surat">Surat</option>
                                    <option value="Vapi">Vapi</option>
                                    <option value="Bharuch">Bharuch</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Ahemdabad">Ahemdabad</option>
                                    <option value="Bhavnagar">Bhavnagar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password : </label>
                                <input type="password" name="pwd" id="pwd" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="img">Photo : </label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn-lg btn-primary form-control">
                    <p>Already have an account?<a href="login.php">SignIn Now</a></p>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>

</html>