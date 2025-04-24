<?php
include('config.php');
$qry = mysqli_query($con, "select * from flower_details");

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


        .fluid-container .row .col-sm-4 {
            padding: 10px;
        }

        .fluid-container .row .col-sm-4 p {
            color: black;
            font-size: 18px;
        }

        .fluid-container .row .col-sm-4 button a {
            color: white;
        }
    </style>
</head>

<body>

    <body>
        <div class="name">
            <p>The <span>Flowers</span> Shopee</p>

            <!-- navbar -->
            <div class="navbar">
                <div class="icon">
                    <img src="icon/icons.jpg" alt="icon" height="70px" width="70px" class="rounded">
                </div>
                <div id="menu">
                    <h2>Flower_Details</h2>
                </div>
                <div class="profile">
                    <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                    <a href="adminDashboard.php">Dashboard</a>
                </div>
            </div>
        </div><br>
        <div class="fluid-container">
            <div class="row">
                <?php
                $qry = mysqli_query($con, "select * from flower_details");
                while ($row = mysqli_fetch_array($qry)) { ?>
                    <div class="col-sm-4 text-center">
                        <div class="card">
                            <div class="card-header">
                                <img src="upload_flower/<?php echo $row['image']; ?>" alt="image" height="250px" width="250px">
                            </div>
                            <div class="card-content">
                                <p><?php echo $row[1]; ?></p>
                                <p><?php echo $row[2]; ?></p>
                                <a href="update_flower.php?fid=<?php echo $row[0]; ?>"><button type="button" class="btn btn-lg btn-info">View_Details</button></a>
                                <button type="button" class="btn btn-lg btn-danger" onclick="return confirm('You Want to Delete This Flower Information ?');"><a href="delete_flower.php?fid=<?php echo $row[0]; ?>">Delete</button></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- <table>
        <tr>
            <th>Flower Id</th>
            <th>Flower Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Color</th>
            <th>Stock_Quantity</th>
            <th>Delivery_Available</th>
            <th>Delivery_Cost</th>
            <th colspan="2">Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($qry)) { ?>
            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><img src="upload_flower/<?php echo $row['image']; ?>" alt="image" height="100px" width="100px"></td>
                <td><?php echo $row[5] ?></td>
                <td><?php echo $row[6] ?></td>
                <td><?php echo $row[7] ?></td>
                <td><?php echo $row[8] ?></td>
                <td><?php echo $row[9] ?></td>
                <td><button onclick="return confirm('You want to Update this record ?')"><a href="update_flower.php?fid=<?php echo $row['flower_id']; ?>">Update</a></button></td>
                <td><button onclick="return confirm('You want to Delete this record ?')"><a href="delete_flower.php?fid=<?php echo $row['flower_id']; ?>">Delete</a></button></td>
            </tr>
        <?php } ?>
    </table> -->
    </body>
</body>

</html>