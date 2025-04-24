<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('user_navbar.php'); ?>

    <div class="search text-center bg-light rounded border p-2">

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <form action="search.php" method="post" class="form-inline">
                    <input type="text" name='searchText' class="form-control mr-3" placeholder="Search for a Brand">
                    <input type="submit" value="Search" name='submitText' class="btn btn-lg btn-outline-primary">
                </form>
            </div>

        </div>
    </div>
    <br>
    <div class="fluid-container">
        <div class="row">
            <?php
            $qry = mysqli_query($con, "select * from watch_details");
            while ($row = mysqli_fetch_array($qry)) { ?>
                <div class="col-sm-4 text-center">

                    <div class="card">
                        <div class="card-header">
                            <a href="user_watch_details.php?wid=<?php echo $row[0]; ?>">
                                <img src="upload_watch/<?php echo $row['image']; ?>" alt="image" height="300px" width="250px">
                            </a>
                        </div>
                        <div class="card-content">
                            <h5 class="text-dark"><?php echo $row[1]; ?></h5>
                            <p><?php echo $row[2]; ?>
                            <h6 class="text-danger">Rs. <?php echo $row[4]; ?></h6>
                            </p>
                            <!-- <a href="user_watch_details.php?wid=<?php echo $row[0]; ?>"><button type="button" class="btn btn-lg btn-info">View Details</button></a> -->
                            <!-- <button type="button" class="btn btn-lg btn-danger" onclick="return alert('Your Order Is Successfully Ordered.');">Order Now</button> -->
                            <a href="orderconfirm.php?wid=<?php echo $row[0];?>">
                                <button type="button" class="btn btn-lg btn-danger">Order Now</button>
                            </a> <!-- <button type="submit" name="submit" class="btn btn-lg btn-info">Add To Cart</button> -->
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>