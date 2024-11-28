<?php include "connect.php"?>
<?php
    $rid = $_GET["rid"];

    mysqli_query($con, "update request set status='Reject' where request_id=$rid");

    header("Location: view-request.php");
?>
