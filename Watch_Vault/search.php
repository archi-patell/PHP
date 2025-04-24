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
            <div class="col-lg-4"></div>
            <div class="col-lg-4 ">
                <form method="post" class="form-inline">
                    <input type="text" name='searchText' class="form-control mr-sm-3" placeholder="Search for a Brand">
                    <input type="submit" value="Search" name='submitText' class="btn btn-lg btn-outline-primary">
                </form>
            </div>
            <!-- <?php
                    if (isset($_POST['submitText'])) {
                        $sql = "select * from watch_details where brand='{$_POST['searchText']}'";
                        $qry = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($qry)) {
                            echo $row['model'];
                        }
                    } ?> -->

        </div>
    </div>
    <br>
    <div class="fluid-container">
        <div class="row">
            <?php
            if (isset($_POST['submitText'])) {
                if (!empty($_POST['searchText'])) {
                    $sql = "select * from watch_details where brand='{$_POST['searchText']}'";
                    $sql1 = "SELECT brand FROM `watch_details` WHERE Not EXISTS (SELECT watch_id FROM `watch_details` WHERE brand='{$_POST['searchText']}');";
                    $qry = mysqli_query($con, $sql);
                    // $qry1 = mysqli_query($con, $sql1);
                    // $row1 = mysqli_fetch_array($qry);
                    // if ($qry1 = mysqli_query($con, $sql1)) {
                    //     echo "<script>alert('No Result Found');window.location.href='user_panel.php'</script>";
                    // }
                    while ($row = mysqli_fetch_array($qry)) {
            ?>
                        <div class="col-sm-4 text-center">

                            <div class="card">
                                <div class="card-header">
                                    <a href="user_watch_details.php?wid=<?php echo $row[0]; ?>">
                                        <img src="upload_watch/<?php echo $row['image']; ?>" alt="image" height="300px" width="250px">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <p><?php echo $row[1]; ?></p>
                                    <p><?php echo $row[2]; ?></p>
                                    <!-- <a href="user_watch_details.php?wid=<?php echo $row[0]; ?>"><button type="button" class="btn btn-lg btn-info">View Details</button></a> -->
                                    <a href="orderconfirm.php?wid=<?php echo $row[0];?>">
                                        <button type="button" class="btn btn-lg btn-danger">Order Now</button>
                                    </a> <!-- <button type="button" class="btn btn-lg btn-info">Add To Cart</button> -->
                                </div>
                            </div>

                        </div>


            <?php }
                } else {
                    echo "<script>window.location.href='user_panel.php'</script>";
                }
            }
            ?>

        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>