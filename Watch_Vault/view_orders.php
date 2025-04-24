<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </style>
</head>

<body>

    <div class="name">
        <p>The <span>Watch</span> Vault</p>

        <!-- navbar -->
        <div class="navbar">
            <div class="icon">
                <img src="icon/icon.png" alt="icon" height="70px" width="70px" class="rounded">
            </div>
            <div id="menu">
                <h2>User_Orders</h2>
            </div>
            <div class="profile">
                <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                <a href="adminDashboard.php">Dashboard</a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-hover table-bordered text-center table-striped p-1">
            <tr>
                <th>Image</th>
                <th>Watch Brand</th>
                <th>Watch Model</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
            <?php
            $uid = $_REQUEST['uid'];
            $con = mysqli_connect("localhost", "root", "", "watch_databse");
            $sql = "SELECT w.*,o.quantity,o.price FROM watch_details w,tblorder o WHERE w.watch_id=o.watch_id and o.user_id={$uid};";
            $qry = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($qry)) {
                echo "
                <tr>
                    <td><img src='upload_watch/$row[5]' alt='Watch Image' height='180px' width='180px'></td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[7]</td>
                    <td>$row[8]</td>
                </tr>
            ";
            }
            ?>
        </table>
        <a href="user_order.php"><button type="button" class="btn btn-warning btn-lg form-control ">Back</button></a>
    </div>
</body>

</html>