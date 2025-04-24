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
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 alert-light border rounded p-4">
                <form action="#" method="post">
                    <h3 class="text-light bg-dark text-center p-3">FeedBack</h3>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Your Email Id..." class="form-control" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="fb" id="fb" placeholder="Your FeedBack..." class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="submitFeedback" value="Submit" class="btn btn-lg form-control btn-primary">
                    </div>
                    <?php
                    $sql1 = "select * from feedback where email='{$_SESSION['mail']}'";
                    $qry1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_array($qry1);
                    if(!empty($row1[0])){
                     echo "<a href='update_feedback.php'>Last FeedBack</a>";
                    }
                    ?>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    <?php
    if (isset($_POST['submitFeedback'])) {
        $email = $_POST['email'];
        // echo $email;
        $fb = $_POST['fb'];
        $sql = "INSERT INTO `feedback`(`email`, `feedback`) VALUES ('{$email}','{$fb}')";
        // echo $sql;
        $qry = mysqli_query($con, $sql);
        echo "<script>alert('Your FeedBack Submited...');window.location.href='user_panel.php';</script>";
    }
    ?>
</body>

</html>