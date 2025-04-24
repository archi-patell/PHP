<?php
$con = mysqli_connect("localhost", "root", "", "flower_database");
if (isset($_REQUEST['fid'])) {
    $fid = $_REQUEST['fid'];
    $qry = mysqli_query($con, "SELECT * FROM `flower_details` WHERE flower_id=$fid");
    $r = mysqli_fetch_array($qry);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fluid-container .row .col-sm-10 {
            border: 3px solid lightgrey;
            border-radius: 4px;
        }

        .fluid-container .row .col-sm-10 .row .col-sm-6 img {
            display: flex;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .fluid-container .row .col-sm-10 .row .col-sm-6 p {
            font-size: 30px;
            text-align: left;
            padding: 10px;
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <?php include('user_navbar.php'); ?>
    <br>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="upload_flower/<?php echo $r['image']; ?>" alt="image" height="400px" width="400px" class="img-thumbnail">
                    </div>
                    <div class="col-sm-6">
                        <p>Flower Name : <?php echo $r[1] ?><br>
                            Description : <?php echo $r[2] ?><br>
                            Price : <?php echo $r[3] ?><br>
                            Category : <?php echo $r[5] ?><br>
                            Color : <?php echo $r[6] ?><br>
                            Stock_Quantity : <?php echo $r[7] ?><br>
                            Delivery_Available : <?php echo $r[8] ?><br>
                            Delivery_Cost : <?php echo $r[9] ?></p>
                        <p>
                            <a href="user_panel.php"><button type="button" class="btn btn-lg btn-success">Back</button></a>
                            <button type="button" class="btn btn-lg btn-danger" onclick="return alert('Your Order Is Successfully Ordered.');">Order Now</button>

                        </p>

                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</body>

</html>