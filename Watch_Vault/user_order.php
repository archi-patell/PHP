<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
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
                <h2>User_Orders</h2>
            </div>
            <div class="profile">
                <img src="icon/avatar3.jpeg" alt="profile" height="60px" width="60px" class="rounded-circle">
                <a href="adminDashboard.php">Dashboard</a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-hover table-bordered text-center table-striped p-1">
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Mobile No</th>
                <th>Total Orders</th>
                <th>View Orders</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "watch_databse");
            $o_sql = "SELECT u.user_name,email,mobile_no,COUNT(o.user_id),o.user_id FROM tblorder o,user_details u WHERE o.user_id = u.user_id GROUP BY o.user_id;";
            $o_qry = mysqli_query($con, $o_sql);
            while ($row = mysqli_fetch_array($o_qry)) {
                echo "
                <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td><a href='view_orders.php?uid=$row[4]'><button type='button' class='btn btn-outline-dark'>View</button></a></td>

                </tr>
            ";
            }
            ?>
        </table>
    </div>
</body>

</html>