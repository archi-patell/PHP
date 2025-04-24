<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('user_navbar.php'); ?>

    <?php
    $sql1 = "select * from feedback where email='{$_SESSION['mail']}'";
    // $sql1 = "select * from feedback where id=1";
    $qry1 = mysqli_query($con, $sql1);
    // $row1 = mysqli_fetch_array($qry1);
    // while($row1 = mysqli_fetch_array($qry1)){
    //     echo $row[0];
    // }
    ?>
    <br>    
    <div class="container">
        <div class="row">
            <!-- <?php while($row1= mysqli_fetch_array($qry1)){?> -->
            <div class="col-lg-4 alert-light border rounded p-4">
                <form action="#" method="post">
                    <h3 class="text-light bg-dark text-center p-3">FeedBack</h3>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" placeholder="Your Email Id..." class="form-control" value="<?php echo $row1[0]; ?>">
                    </div>

                    <div class=" form-group">
                        <textarea name="fb" id="fb" placeholder="User FeedBack..." class="form-control"><?php echo $row1[2]; ?></textarea>
                    </div>
                    <div class=" form-group">
                        <textarea name="afb" id="fb" placeholder="Admin FeedBack..." class="form-control" disabled><?php if (!empty($row1[3])) {
                                                                                                                        echo $row1[3];
                                                                                                                    } ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <input type="submit" name="submitFeedback" value="Update" class="btn btn-lg form-control btn-primary">
                        </div>
                        <div class="col-lg-6">
                    <input type="submit" name="deleteFeedback" value="Delete" class="btn btn-lg form-control btn-danger">
                        </div>
                    </div>
                    <a href="feedback.php">New FeedBack</a>
                </form>
            </div>
            <!-- <?php }?> -->
        </div>
    </div>

    <?php
    if (isset($_POST['submitFeedback'])) {
        $id = $_POST['id'];
        $fb = $_POST['fb'];
        $sql = "UPDATE `feedback` SET `feedback`='{$fb}' WHERE `id`='{$id}'";
        $qry = mysqli_query($con, $sql);
        echo "<script>alert('Your FeedBack Updated...');</script>";
    }

    if (isset($_POST['deleteFeedback'])) {
        $id = $_POST['id'];
        $fb = $_POST['fb'];
        $sql = "DELETE FROM `feedback` WHERE `id`='{$id}'";
        $qry = mysqli_query($con, $sql);
        echo "<script>alert('Your FeedBack Deleted...');window.location.href='user_panel.php'</script>";
    }
    ?>
</body>

</html>