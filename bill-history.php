<?php session_start()?>
<?php include "connect.php"?>
<title>Auto care</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
<?php
    $cid = $_SESSION["cuserid"];

    $rs = mysqli_query($con, "select bill_no, bill_date, vehicle_no, bill_amt, card_no, bank_name, bill_status from bill, request where bill.request_id = request.request_id and cust_username = '$cid'");

    while($row = mysqli_fetch_row($rs)){
?>
<table class="table">
<tr>
    <td><b>Bill No:</b></td><td><?=$row[0]?></td>
</tr>
<tr>
    <td><b>Bill Date:</b></td><td><?=$row[1]?></td>
</tr>
<tr>
    <td><b>Vehicle No:</b></td><td><?=$row[2]?></td>
</tr>
<tr>
    <td><b>Bill Amount:</b></td><td><?=$row[3]?></td>
</tr>
<tr>
    <td><b>Card No:</b></td><td><?=$row[4]?></td>
</tr>
<tr>
    <td><b>Bank Name:</b></td><td><?=$row[5]?></td>
</tr>
<tr>
    <td><b>Bill Status:</b></td><td><?=$row[6]?></td>
</tr>
</table>
<?php
    }
?>
</div>