<?php
include('config.php');
$sql1 = mysqli_query($con, "select count(user_id) from user_details");
$sql2 = mysqli_query($con, "select count(flower_id) from flower_details");
$qry = mysqli_query($con, "select * from flower_details order by flower_id desc limit 2");
$total = mysqli_fetch_array($sql1);
$total2 = mysqli_fetch_array($sql2);

$dataPoints = array(
    array("label" => "2024", "y" => 60.0),
    array("label" => "2023", "y" => 6.5),
    array("label" => "2022", "y" => 4.6),
    array("label" => "2021", "y" => 2.4),
    array("label" => "2020", "y" => 1.9),
    array("label" => "2019", "y" => 1.8),
    array("label" => "2018", "y" => 1.5),
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "YEARLY IMPROVMENTS"
                },
                axisY: {
                    suffix: "%",
                    scaleBreaks: {
                        autoCalculate: true
                    }
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0\"%\"",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "white",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
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
            font-family:  Georgia, Times, 'Times New Roman', serif;
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

        .row .col-sm-9 .name,.second p span {
            color: rgb(202, 68, 68);
            color: rgb(128, 0, 102);
            color: maroon;
            font-weight: bold;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .fluid-container .row .col-sm-9 .row .content .total {
            cursor: pointer;
            background-color: lavender;
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
         .chart{
            width: auto;
        }
    </style>
</head>

<body>

    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-3">
                <div class="header text-center">
                    <img src="icon/icons.jpg" alt="icon" height="70px" width="70px" class="rounded-circle">
                    <p>Admin Panel</p>
                </div>
                <hr>
                <ul style="list-style: none;">
                    <li><a href="adminDashboard.php">DashBoard</a></li>
                    <li><a href="flower_details.php">Flowers Details</a></li>
                    <li><a href="user_details.php">User Details</a></li>
                    <li><a href="add_flower_details.php">Add Flower Details</a></li>
                    <li><a href="logout.php" onclick="return confirm('You want to LogOut.')">LogOut</a></li>
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="name">
                    <p>The <span>Flowers</span> Shopee</p>
                </div>
                <div class="name">
                    <p><span>DASHBOARD</span></p>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 content">
                        <div class="total">
                            <p><?php echo $total[0]; ?></p>
                            <hr>
                            <p>Registered Customer</p>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-4 content">
                        <div class="total">
                            <p><?php echo $total2[0]; ?></p>
                            <hr>
                            <p>Available Flowers</p>
                        </div>
                    </div>
                    <div class="col-sm-4 content">
                        <div class="total">
                            <p>10</p>
                            <hr>
                            <p>Completed Orders</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="chart">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                        </div>
                    </div>
                    <div class="col-6 history">
                        <p class="text-center heading">Newly Added Flowers</p>
                        <div class="row">
                            <?php
                            while ($t3 = mysqli_fetch_array($qry)) { ?>
                                <div class="col-sm-6 text-center">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="upload_flower/<?php echo $t3['image']; ?>" alt="image" height="100px" width="100px">
                                        </div>
                                        <div class="card-content">
                                            <p><?php echo $t3[1]; ?><br>
                                                <?php echo $t3[2]; ?></p>
                                            <a href="flower_details.php?fid=<?php echo $t3[0]; ?>"><button type="button" class="btn btn-lg btn-info">View_Details</button></a>
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

</body>

</html>