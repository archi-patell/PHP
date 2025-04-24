<?php
include('config.php');
$qry = mysqli_query($con, "select * from user_details");
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
                <h2>User_Details</h2>
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
            <?php
            $qry = mysqli_query($con, "select * from user_details");
            while ($row = mysqli_fetch_array($qry)) { ?>
                <div class="col-sm-4 text-center">
                    <div class="card">
                        <div class="card-header">
                            <img src="upload_img/<?php echo $row['photo']; ?>" alt="image" height="200px" width="200px" class="rounded-circle img-responsive">

                        </div>
                        <div class="card-content">
                            <p>User Name : <?php echo $row[1] ?><br>
                                Address : <?php echo $row[2] ?><br>
                                Mobile No : <?php echo $row[3] ?><br>
                                Email Id : <?php echo $row[4] ?><br>
                                City : <?php echo $row[5] ?><br>
                                <a href="delete_user.php?uid=<?php echo $row[0];?>">
                                    <button type="button" class="btn btn-lg btn-danger">Delete User</button>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- <table>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th>Email Id</th>
            <th>City</th>
            <th>Photo</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($qry)) { ?>
            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td><?php echo $row[6] ?></td>
                <td><img src="upload_img/<?php echo $row['photo']; ?>" alt="image" height="100px" width="100px"></td>
            </tr>
        <?php } ?>
    </table> -->
</body>

</html>