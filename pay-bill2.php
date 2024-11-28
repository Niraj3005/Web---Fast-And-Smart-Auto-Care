<?php include "connect.php"?>
<?php
    $bid = $_POST["bid"];
    $rid = $_POST["rid"];
    $cardno = $_POST["cardno"];
    $bname = $_POST["bname"];

    mysqli_query($con, "update bill set card_no='$cardno', bank_name='$bname', bill_status='Paid' where bill_no=$bid");

    mysqli_query($con, "update request set status='Closed' where request_id = $rid");
?>
<script language="javascript" type="text/javascript">
    alert("Bill paid successfully!!!")
    window.location="home.php";
</script>    					



