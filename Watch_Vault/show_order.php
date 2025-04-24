
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin: auto;
            border: 4px solid grey;
            font-size: 20px;
            text-align: center;
        }

        th {
            background-color: black;
            color: white;
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: lightslategray;
            border: 1px solid grey;
        }

        table tr td button {
            background-color: darkgoldenrod;
        }

        table tr td a {
            color: white;
            text-decoration: none;
        }

        table tr td a:hover {
            color: black;
            text-decoration: none;
        }

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
            align-items: center;
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


        .fluid-container .row .col-sm-4 {
            padding: 10px;
        }

        .fluid-container .row .col-sm-4 p {
            color: black;
            font-size: 18px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div class="name">
        <p>The <span></span>Vault</p>

        <!-- navbar -->
        <div class="navbar">
            <div class="icon">
                <img src="icon/icon.png" alt="icon" height="70px" width="70px" class="rounded">
            </div>
            <div id="menu">
                <h2>Watch_Details</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="fluid-container">
        <div class="row">
            <table>
                <tr>
                    <th>Watch Id</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                  
                </tr>
        </div>
    </div>

    <?php

        $select="SELECT * FROM `order`";
        $query=mysqli_query($con,$select);
        while($row=mysqli_fetch_array($query))
        {
         ?>
        <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><img src="upload_watch/<?php echo $row['image']; ?>" alt="image" height="100px" width="100px"></td>
            <td><?php echo $row[6]; ?></td>
            
            <!-- <td><a href="order_delete.php?watch_id=<?php echo $row[0]; ?>">
                    <button type="button" class="btn btn-lg btn-danger">Delete</button>
                </a></td> -->
        </tr>
    <?php
    }
    ?>
    </table>
</body>

</html>