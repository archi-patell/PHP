<?php
include('config.php');
if (isset($_REQUEST['fid'])) {
    $fid = $_REQUEST['fid'];
    $qry = mysqli_query($con, "DELETE FROM `flower_details` WHERE flower_id=$fid");
    echo "<script>alert('Record is deleted.');
        window.location.href='flower_details.php';
    </script>";
}
?>