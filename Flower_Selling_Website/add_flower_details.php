<?php

$con = mysqli_connect("localhost", "root", "", "flower_database");

if (isset($_POST['submit'])) {

    if (!empty($_POST['fname']) && !empty($_POST['desc']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['category']) && !empty($_POST['da']) && !empty($_POST['dcost'])) {
        $fname = $_POST['fname'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        $da = $_POST['da'];
        $dcost = $_POST['dcost'];
        $img = $_FILES['img']['name'];
        $tmp_img = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp_img, "upload_flower/$img");
        $qry = mysqli_query($con, "INSERT INTO `flower_details`(`flower_name`, `description`, `price`, `image`, `category`, `color`, `stock_quantity`, `delivery_available`, `delivery_cost`) VALUES ('{$fname}','{$desc}','{$price}','{$img}','{$category}','{$color}','{$stock}','{$da}','{$dcost}')");
        echo "<script>alert('Your Data successfully Registered.');
            window.location.href='flower_details.php';
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
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
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
    </style>
</head>

<body>
    <div class="name">
        <p>The <span>Flowers</span> Shopee</p>

        <!-- navbar -->
        <div class="navbar">
            <div class="icon">
                <img src="icon/icons.jpg" alt="icon" height="70px" width="70px" class="rounded">
            </div>
            <div id="menu">
                <h2>Add_Flower_Details</h2>
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
                    <h4>FLOWER INFORMATION</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fname">Flower Name : </label>
                                <input type="text" name="fname" id="fname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="desc">Description : </label>
                                <input type="text" name="desc" id="desc" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Price : </label>
                                <input type="number" name="price" id="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="color">Color : </label>
                                <input type="text" name="color" id="color" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Category : </label>
                                <input type="text" name="category" id="category" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="stock">Stock_Quantity : </label>
                                <input type="number" name="stock" id="stock" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dcost">Delivery_Cost : </label>
                                <input type="text" name="dcost" id="dcost" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="da">Delivery_Available : </label>
                                <input type="radio" name="da" id="da" value="YES">YES
                                <input type="radio" name="da" id="da" value="NO">NO
                            </div>
                            <div class="form-group">
                                <label for="img">Photo : </label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>

                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit" class="btn-lg btn-primary form-control">
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</body>

</html>