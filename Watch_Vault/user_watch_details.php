<?php
$con = mysqli_connect("localhost", "root", "", "watch_databse");
if (isset($_REQUEST['wid'])) {
    $wid = $_REQUEST['wid'];
    $qry = mysqli_query($con, "SELECT * FROM `watch_details` WHERE watch_id=$wid");
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
                        <img src="upload_watch/<?php echo $r['image']; ?>" alt="image" height="auto" width="auto" class="img-thumbnail">
                    </div>
                    <div class="col-sm-6">
                        <h1 class="text-center" style="border-bottom: 3px solid black;"><?php echo $r[1] ?></h1>
                        <br>
                        <table>
                            <tr>
                                <td><b>Watch Brand :</b></td>
                                <td><?php echo $r[2] ?></td>
                            </tr>
                            <tr>
                                <td><b>Stock_Quantity :</b></td>
                                <td><?php echo $r[3] ?></td>
                            </tr>
                            <tr>
                                <td><b>Price :</b></td>
                                <td><?php echo $r[4] ?></td>
                            </tr>
                            <tr>
                                <td><b>Description :</b></td>
                                <td><?php echo $r[6] ?></td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <p style="border-top: 3px solid black;"></p>
                        <span >
                            <a href="user_panel.php"><button type="button" class="btn btn-lg btn-success">Back</button></a>
                            <button type="button" class="btn btn-lg btn-danger" onclick="return alert('Your Order Is Successfully Ordered.');">Order Now</button>
                        </span>

                    </div>
                    
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</body>

</html>