<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('user_navbar.php'); ?>
    <br>
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
                    <a href="user_flower_details.php?fid=<?php echo $row[0]; ?>"><button type="button" class="btn btn-lg btn-info">View Details</button></a>
                    <button type="button" class="btn btn-lg btn-danger" onclick="return alert('Your Order Is Successfully Ordered.');">Order Now</button>
                
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>