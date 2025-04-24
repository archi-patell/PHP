<?php
include('config.php');
if (isset($_REQUEST['wid'])) {
    $wid = $_REQUEST['wid'];
    $qry = mysqli_query($con, "DELETE FROM `watch_details` WHERE watch_id=$wid");
    echo "<script>alert('Record is deleted.');
        window.location.href='watch_details.php';
    </script>";
}
?>