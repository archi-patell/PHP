<?php

$con = mysqli_connect("localhost", "root", "", "watch_databse");

if (isset($_REQUEST['uid'])) {
    $uid = $_REQUEST['uid'];
    $qry = mysqli_query($con, "SELECT * FROM `user_details` WHERE user_id=$uid");
    $row = mysqli_fetch_array($qry);
}
if (isset($_POST['submit'])) {

    if (!empty($_POST['uname']) && !empty($_POST['add']) && !empty($_POST['mno']) && !empty($_POST['email']) && !empty($_POST['city'])) {
        $uname = $_POST['uname'];
        $add = $_POST['add'];
        $mno = $_POST['mno'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $pwd = $_POST['pwd'];
        $img = $_FILES['img']['name'];
        $old = $_REQUEST['old_img'];
        $temp_img = $_FILES['img']['tmp_name'];
        if (!empty($img)) {
            move_uploaded_file($temp_img, "upload_img/$img");
        } else {
            $img = $old;
        }
        $qry = mysqli_query($con, "UPDATE `user_details` SET `user_name`='{$uname}',`address`='{$add}',`mobile_no`='{$mno}',`email`='{$email}',`password`='{$pwd}',`city`='{$city}',`photo`='{$img}' WHERE `user_id`='{$uid}'");
        session_start();
        if ($_SESSION['mail'] == 'admin@gmail.com') {
            echo "<script>alert('Your Information successfully Updated.');
                window.location.href='user_details.php';
                </script>";
        } else {
            echo "<script>alert('Your Information successfully Updated.');
            window.location.href='user_panel.php';
            </script>";
        }
    } else {
        echo "<script>alert('please Insert all the required data.')</script>";
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
    <!-- <style>
        form {
            width: auto;
            margin: auto;
            background-color: rgb(190, 189, 189);
            border: 0px solid rgb(0, 0, 0);
            padding: 10px;

        }

        form h4 {
            text-align: center;
            background-color: rgb(59, 59, 59);
            color: white;
            font-size: 30px;
        }
    </style> -->
</head>

<body><br>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 alert alert-secondary boredr rounded p-4">
            <form action="#" method="post" name="form" enctype="multipart/form-data" require>
                <h4 class="bg-dark text-light p-2 text-center">USER PROFILE</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="uid">User Id : </label>
                            <input type="text" name="uid" id="uid" class="form-control" value="<?php echo $row['user_id']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uname">User Name : </label>
                            <input type="text" name="uname" id="uname" class="form-control" value="<?php echo $row['user_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="add">Address : </label>
                            <input type="text" name="add" id="add" class="form-control" value="<?php echo $row['address']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="mno">Mobile No. : </label>
                            <input type="number" name="mno" id="mno" class="form-control" value="<?php echo $row['mobile_no']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email : </label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="city">City : </label>
                            <select name="city" id="city" class="form-control">
                                <option value=""></option>
                                <option value="Surat" <?php if ($row['city'] == 'Surat') {
                                                            echo 'selected';
                                                        } ?>>Surat</option>
                                <option value="Vapi" <?php if ($row['city'] == 'Vapi') {
                                                            echo 'selected';
                                                        } ?>>Vapi</option>
                                <option value="Bharuch" <?php if ($row['city'] == 'Bharuch') {
                                                            echo 'selected';
                                                        } ?>>Bharuch</option>
                                <option value="Vadodara" <?php if ($row['city'] == 'Vadodara') {
                                                                echo 'selected';
                                                            } ?>>Vadodara</option>
                                <option value="Ahemdabad" <?php if ($row['city'] == 'Ahemdabad') {
                                                                echo 'selected';
                                                            } ?>>Ahemdabad</option>
                                <option value="Bhavnagar" <?php if ($row['city'] == 'Bhavnagar') {
                                                                echo 'selected';
                                                            } ?>>Bhavnagar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password : </label>
                            <input type="password" name="pwd" id="pwd" class="form-control" value="<?php echo $row['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="img">Photo : </label>
                            <input type="file" name="img" class="form-control">
                            <input type="hidden" name="old_img" value="<?php echo $row['photo']; ?>" class="form-control">
                            <img src="upload_img/<?php echo $row['photo']; ?>" alt="image" height="100px" width="100px">
                        </div>
                    </div>
                </div>



                <input type="submit" name="submit" value="Update" class="btn-lg btn-primary form-control">
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>

</html>