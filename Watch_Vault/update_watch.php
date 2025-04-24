<?php
include('config.php');
if (isset($_REQUEST['wid'])) {
    $wid = $_REQUEST['wid'];
    $qry = mysqli_query($con, "SELECT * FROM `watch_details` WHERE watch_id=$wid");
    $row = mysqli_fetch_array($qry);
}

if (isset($_POST['submit'])) {

    if (!empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['price']) && !empty($_POST['stock'])) {
        $wid = $_REQUEST['wid'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $model = $_POST['model'];
        $stock = $_POST['stock'];
        $desc = $_POST['desc'];
        $img = $_FILES['img']['name'];
        $old = $_REQUEST['old_img'];
        $temp_img = $_FILES['img']['tmp_name'];
        move_uploaded_file($temp_img, "upload_watch/$img");
        if (!empty($img)) {
            move_uploaded_file($img, "upload_watch/$img");
        } else {
            $img = $old;
        }
        $qry = mysqli_query($con, "UPDATE `watch_details` SET `brand`='{$brand}',`model`='{$model}',`quantity`='{$stock}',`price`='{$price}',`image`='{$img}',`description`='{$desc}' WHERE `watch_id`={$wid}");
        echo "<script>alert('Watch Information successfully Updated.');
            window.location.href='watch_details.php';
            </script>";
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
    <style>
        .name p {
            text-align: center;
            padding: 2px;
            color: rgb(168, 53, 53);
            background-color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 35px;
            margin: auto;
        }

        .name p span {
            color: maroon;
            font-weight: bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .name .navbar {
            display: flex;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: rgb(51, 52, 53);
        }

        #menu h2 {
            padding: 10px;
            font-size: 40px;
            color: white;
            text-decoration: none;
        }

        #menu h2:hover {
            border: 2px solid black;
            border-radius: 8px;
        }

        .profile {
            display: flex;
            flex-direction: column;
        }

        .profile a,
        img {
            font-size: 20px;
            margin: auto;
            color: white;
        }

        .fluid-container .row .col-sm-8 form {
            width: auto;
            margin: auto;
            border: 1px solid rgb(0, 0, 0);
            padding: 10px;
        }

        .fluid-container .row .col-sm-8 form h4 {
            text-align: center;
            background-color: rgb(59, 59, 59);
            color: white;
            font-size: 30px;
        }

        .profile {
            display: flex;
            flex-direction: column;
        }

        .profile a,
        img {
            font-size: 20px;
            margin: auto;
            color: white;
        }

        .sidebar {
            height: 600px;
            background-color: rgb(24, 24, 24);
        }

        #menu,
        .logout {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="name">
        <p>The <span>watchs</span> Vault</p>

        <!-- navbar -->
        <div class="navbar">
            <div class="icon">
                <img src="icon/icon.png" alt="icon" height="70px" width="70px" class="rounded">
            </div>
            <div id="menu">
                <h2>Modify_watch_Details</h2>
            </div>
            <div class="profile">
                <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                <a href="adminDashboard.php">Dashboard</a>
            </div>
        </div>
    </div>
    <br>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form action="#" method="post" name="form" enctype="multipart/form-data" require>
                    <h4>WATCH INFORMATION</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="wid">watch Id : </label>
                                <input type="text" name="wid" id="wid" class="form-control" value="<?php echo $row[0]; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="brand">Brand : </label>
                                <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $row[1]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="model">Model : </label>
                                <input type="text" name="model" id="model" class="form-control" value="<?php echo $row[2]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Price : </label>
                                <input type="text" name="price" id="price" class="form-control" value="<?php echo $row[4]; ?>">
                            </div>


                        </div>
                        <div class="col-sm-6">
                            
                            <div class="form-group">
                                <label for="stock">Stock_Quantity : </label>
                                <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $row[3]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="desc">Description : </label>
                                <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $row[6]; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="img">Photo : </label>
                                <input type="file" name="img" id="img" class="form-control">
                                <input type="hidden" name="old_img" value="<?php echo $row['image']; ?>" class="form-control">
                                <img src="upload_watch/<?php echo $row['image']; ?>" alt="image" height="120px" width="120px">
                            </div>

                        </div>
                    </div>
                    <input type="submit" name="submit" value="Update_Details" class="btn btn-lg btn-primary">
                    <a href="watch_details.php"><input type="button" value="Back" class="btn btn-lg btn-success"></a>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>

</html>