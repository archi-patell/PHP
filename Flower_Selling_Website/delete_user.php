<?php
include('config.php');
if (isset($_REQUEST['uid'])) {
    $uid = $_REQUEST['uid'];
    $qry = mysqli_query($con, "DELETE FROM `user_details` WHERE user_id=$uid");
    echo "<script>alert('Record is deleted.');
        window.location.href='user_details.php';
    </script>";
}
?>
