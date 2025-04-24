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
                <h2>Customer_FeedBack</h2>
            </div>
            <div class="profile">
                <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                <a href="adminDashboard.php">Dashboard</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            include('config.php');
            $sql1 = "select * from feedback";
            $qry1 = mysqli_query($con, $sql1);
            while ($row1 = mysqli_fetch_array($qry1)) {
            ?>

                <div class="col-lg-4 alert-light border rounded p-4">
                    <form action="admin_feedback.php?id=<?php echo $row1[0]; ?>" method="post">
                        <h5 class="text-light bg-dark text-center p-3"><?php echo $row1['email']; ?></h5>


                        <div class=" form-group">
                            <textarea name="afb" id="afb" placeholder="User FeedBack..." class="form-control" disabled><?php echo $row1[2]; ?></textarea>
                        </div>
                        <div class=" form-group">
                            <textarea name="afb" id="afb" rows="5" cols="40" placeholder="Admin FeedBack..." class="form-control"><?php if (!empty($row1[3])) {echo $row1[3];}?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submitFeedback" value="Submit" class="btn btn-lg form-control btn-primary">
                        </div>
                    </form>
                </div>

            <?php } ?>
        </div>
    </div>
    <?php
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        // echo $email;
        $fb = $_POST['afb'];
        // echo $fb;
        $sql = "UPDATE `feedback` SET `reply`='{$fb}' WHERE `id`='{$id}'";
        $qry = mysqli_query($con, $sql);
        echo "<script>alert('Send Your FeedBack successfully...');</script>";
    }

    ?>
</body>

</html>