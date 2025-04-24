<?php
include('config.php');
$sql1 = mysqli_query($con, "select count(user_id) from user_details");
$sql2 = mysqli_query($con, "select count(watch_id) from watch_details");
$qry = mysqli_query($con, "select * from watch_details order by watch_id desc limit 2");
$total = mysqli_fetch_array($sql1);
$total2 = mysqli_fetch_array($sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            padding: 0px;
        }

        .fluid-container .row .col-sm-3 {
            background-color: rgb(0, 0, 0);
        }

        .fluid-container .row .col-sm-3 .header p {
            font-size: 35px;
            color: rgb(128, 0, 102);
            font-family: Georgia, Times, 'Times New Roman', serif;
        }

        .fluid-container .row .col-sm-3 hr {
            background-color: wheat;
            width: auto;
        }

        .fluid-container .row .col-sm-3 ul li a {
            font-size: 25px;
            color: white;
            text-decoration: none;
        }

        .fluid-container .row .col-sm-3 ul li a:hover {
            color: red;
        }

        .row .col-sm-9 .name p {
            text-align: center;
            padding: 2px;
            color: rgb(168, 53, 53);
            background-color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 35px;
            margin: auto;
        }

        .row .col-sm-9 .name,
        .second p span {
            color: rgb(202, 68, 68);
            color: rgb(128, 0, 102);
            color: maroon;
            font-weight: bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .fluid-container .row .col-sm-9 .row .content .total {

            margin: 1px;
        }

        .fluid-container .row .col-sm-9 .row .col-sm-4 .total hr {
            background-color: black;
        }

        .fluid-container .row .col-sm-9 .row .col-sm-4 .total p {
            text-align: center;
            font-size: 30px;
        }

        .history .heading {
            font-size: 30px;
            background-color: black;
            color: white;
        }

        .chart {
            width: auto;
        }
    </style>
</head>


<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-3">
                <div class="header text-center">
                    <img src="icon/icon.png" alt="icon" height="70px" width="70px" class="rounded-circle">
                    <p>Admin Panel</p>
                </div>
                <hr>
                <ul style="list-style: none;">
                    <li><a href="adminDashboard.php">DashBoard</a></li>
                    <li><a href="watch_details.php">Watch Details</a></li>
                    <li><a href="user_details.php">User Details</a></li>
                    <li><a href="add_watch_details.php">Add Watch Details</a></li>
                    <li><a href="user_order.php">Customer Orders</a></li>
                    <li><a href="admin_feedback.php">Customer FeedBack</a></li>
                    <li><a href="logout.php" onclick="return confirm('You want to LogOut.')">LogOut</a></li>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="name">
                    <p>The <span>Watch</span> Vault</p>
                </div>
                <div class="name">
                    <p><span>DASHBOARD</span></p>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 content ">
                        <a href="user_details.php" style="text-decoration: none;">

                            <div class="total alert alert-dark">
                                <p><?php echo $total[0]; ?></p>
                                <hr>
                                <p>Registered Customer</p>
                            </div>
                        </a>

                        <br>
                    </div>
                    <div class="col-sm-4 content">
                        <a href="watch_details.php" style="text-decoration: none;">

                            <div class="total alert alert-dark">
                                <p><?php echo $total2[0]; ?></p>
                                <hr>
                                <p>Available Watch</p>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="row">

                    <div class="container">
                        <div class="history">
                            <p class="text-center heading">Newly Added Watch</p>
                            <div class="row">
                                <?php
                                while ($t3 = mysqli_fetch_array($qry)) { ?>
                                    <div class="col-sm-6 text-center">
                                        <div class="card">
                                            <div class="card-header">
                                                <img src="upload_watch/<?php echo $t3[5]; ?>" alt="image" height="100px" width="100px">
                                            </div>
                                            <div class="card-content">
                                                <p><?php echo $t3[1]; ?><br>
                                                    <?php echo $t3[2]; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="update_watch.php?wid=<?php echo $t3[0]; ?>"><button type="button" class="btn btn-lg btn-outline-dark">View_Details</button></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>