<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        .sidebar {
            height: 600px;
            background-color: rgb(24, 24, 24);
        }

        #menu,
        .logout {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('user_navbar.php'); ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="sidebar">
                <div class="profile">
                    <a href="profile.php?uid=<?php echo $row[0]; ?>">
                        <img src='upload_img/<?php echo $row[7]; ?>' alt='image' height='200px' width='200px' class='rounded-circle'>
                    </a>
                </div><br>
                <div id="menu">
                    <a>Hello, <?php echo $row['user_name']; ?></a>
                </div><br>
                <div class="logout">
                    <a href="logout.php"><button type="button" onclick="return confirm('You want to LogOut ?')" class="btn btn-lg btn-warning">LogOut</button></a>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <?php include('update_user.php'); ?>
        </div>

    </div>
</body>

</html>