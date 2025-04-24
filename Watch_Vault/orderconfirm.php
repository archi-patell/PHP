<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "watch_databse");
$sql1 = "select * from user_details where email='{$_SESSION['mail']}'";
$qry1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($qry1);
$uid = $row1[0];
if (isset($_REQUEST['wid'])) {
    $wid = $_REQUEST['wid'];
    $qry = mysqli_query($con, "SELECT * FROM `watch_details` WHERE watch_id=$wid");
    $row = mysqli_fetch_array($qry);
}
// echo $wid;
if (isset($_POST['submit'])) {

    if (!empty($_POST['brand']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {
        $brand = $_POST['brand'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $total=$quantity*$price;
        $sql = "INSERT INTO `tblorder`(`watch_id`, `user_id`, `brand`, `quantity`, `price`) VALUES ('{$wid}','{$uid}','{$brand}','{$quantity}','{$total}')";
        echo $sql;
            $qry = mysqli_query($con, $sql);
            echo "<script>alert('Your Order successfully Confirm.');
                window.location.href='user_panel.php';
                </script>";
    }
    //  else {
    //     echo "<script>alert('Please Insert all the required data.')</script>";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .fluid-container .row .col-sm-8 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .fluid-container .row .col-sm-8 form {
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
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 bg-light p-4 border rounded">
                <form action="#" method="post" name="form" enctype="multipart/form-data" require>
                    <h4 class="bg-dark text-light text-center p-3">Order Details</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="brand">Brand / Model: </label>
                                <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $row[1] ?>">
                            </div>
                            <div class="form-group">
                                <label for="stock">Quantity : </label>
                                <input type="number" name="quantity" onchange="total()" id="quantity" class="form-control" value="1">
                            </div>
                            <div class="form-group">
                                <label for="price">Price : </label>
                                <input type="text" name="price" id="price" class="form-control" value="<?php echo $row[4]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="desc">Description : </label>
                                <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $row[6]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <img src="upload_watch/<?php echo $row['image']; ?>" alt="image" height="120px" width="120px">
                            </div>

                            <div class="form-group">
                                <label for="add">Address : </label>
                                <input type="text" name="add" id="add" class="form-control" value="<?php echo $row1[2] ?>">
                            </div>
                            <div class="form-group">
                                <label for="city">City : </label>
                                <select name="city" id="city" class="form-control">
                                    <option value=""></option>
                                    <option value="Surat" <?php if($row1[6]=='Surat'){echo "selected";}?> >Surat</option>
                                    <option value="Vapi" <?php if($row1[6]=='Vapi'){echo "Vapi";}?>>Vapi</option>
                                    <option value="Bharuch" <?php if($row1[6]=='Baruch'){echo "Bharuch";}?>>Bharuch</option>
                                    <option value="Vadodara" <?php if($row1[6]=='Vadodara'){echo "Vadodara";}?>>Vadodara</option>
                                    <option value="Ahemdabad" <?php if($row1[6]=='Ahemdabad'){echo "Ahemdabad";}?>>Ahemdabad</option>
                                    <option value="Bhavnagar" <?php if($row1[6]=='Bhavnagar'){echo "Bhavnagar";}?>>Bhavnagar</option>
                                </select>
                            </div>
                            <div class="borderd rounded p-4 bg-light">
                                <h3 class='text-left alert alert-info rounded border p-1'>Total</h3>
                                <h5 class='text-right' id="total">

                                </h5>
                                <br>
                                <div class="form-check text-left ">
                                    <input type="radio" name="cash" id="cash" class="form-check-input" checked>
                                    <label for="cash" class="form-check-label">
                                        Cash On Delivery
                                    </label>
                                </div>

                            </div>

                        </div>
                    </div>
                    <input type="submit" name="submit" value="Confirm" class="btn btn-lg btn-warning form-control">
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <!-- <div id="total"></div> -->

    <script>
        function total() {
            var price = document.getElementById("price").value;
            var quantity = document.getElementById("quantity").value;
            var totalPrice = quantity * price;
            document.getElementById("total").innerHTML = totalPrice;
        }
    </script>
</body>

</html>