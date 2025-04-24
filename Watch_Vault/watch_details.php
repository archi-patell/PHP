<?php
include('config.php');
$sql = "select * from watch_details";
$qry = mysqli_query($con, $sql);
$sql1 = "select * from user_details where email='{$_SESSION['mail']}'";
$qry1 = mysqli_query($con, $sql1);
$r = mysqli_fetch_array($qry1);
// echo $r[1];
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
    </style>
</head>

<body>
    <div class="name">
        <p>The <span>Watch</span> Vault</p>

        <!-- navbar -->
        <div class="navbar">
            <div class="icon">
                <img src="icon/icon.png" alt="icon" height="70px" width="70px" class="rounded">
            </div>
            <div id="menu">
                <h2>Watch_Details</h2>
            </div>
            <div class="profile">
                <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                <a href="adminDashboard.php">Dashboard</a>
            </div>
        </div>
    </div><br>

    <div>
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($qry)) {
            ?>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-heading text-center">
                            <a href="watch_details.php?wid=<?php echo $row[0]; ?>">
                                <img src="upload_watch/<?php echo $row[5]; ?>" alt="watch" height="400px" width="auto">
                            </a>
                        </div>
                        <div class="card-body text-center" style="color:gray;">

                            <p><h5 class="text-dark"><?php echo $row[1]; ?></h5>
                                <?php echo $row[2]; ?><br>
                                <h6 class="text-danger">Rs. <?php echo $row[4]; ?></h6><br></p>
                            <a href="update_watch.php?wid=<?php echo $row[0]; ?>"><button type="button" class="btn btn-lg btn-info">View_Details</button></a>
                            <a href="delete_watch.php?wid=<?php echo $row[0]; ?>">
                                <button type="button" class="btn btn-lg btn-success" onclick="return confirm('You Want to Delete This Watch Information ?');">Delete</button>
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>

    

</body>

</html>