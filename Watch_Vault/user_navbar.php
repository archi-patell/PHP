<?php
include('config.php');
$sql = "select * from user_details where email='{$_SESSION['mail']}'";
$qry = mysqli_query($con, $sql);
$row = mysqli_fetch_array($qry);

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

        .navbar {
            display: flex;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: rgb(51, 52, 53);
        }

        .fluid-container .row .col-sm-4 {
            padding: 10px;
        }

        .fluid-container .row .col-sm-4 p {
            color: lightslategrey;
        }

        .navbar {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: white;
        }

        #menu a {
            padding-left: 10px;
            padding-right: 10px;
            font-size: 30px;
            color: white;
            text-decoration: none;
        }

        #menu a:hover {
            color: grey;
            font-size: 30px;
            border: 2px solid black;
            border-radius: 8px;
        }


        .header h4 {
            padding-top: auto;
            text-align: center;
            background-color: rgb(59, 59, 59);
            color: rgb(202, 68, 68);
            font-size: 35px;
        }

        /* AboutUs and ContactUs */

        .row .col-sm-7 hr {
            width: auto;
            background-color: black;
        }

        .row .col-sm-7 h4 {
            text-align: center;
            background-color: rgb(183, 31, 74);
            color: white;
            font-size: 30px;
        }

        .row .col-sm-7 h5 {
            background-color: rgb(221, 218, 218);
        }

        .row .col-sm-5 {
            padding: 10px;
            text-align: center;
        }

        .row .col-sm-5 img {
            margin: auto;
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
                <a href="user_panel.php">Home</a>
                <a href="about_us.php">About_Us</a>
                <a href="contact_us.php">Contact_Us</a>
                <a href="feedback.php">FeedBack</a>
            </div>
            <div class="profile">
                <a href="user_profile.php?uid=<?php echo $row[0]; ?>">
                    <img src='upload_img/<?php echo $row[7]; ?>' alt='image' height='60px' width='60px' class='rounded-circle'>
                </a>
            </div>
        </div>
    </div>

    
</body>

</html>