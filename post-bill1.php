<?php include "connect.php"?>
<?php 
        $bid = $_POST["bid"];
        $bdate = $_POST["bdate"];
        $rid = $_POST["rid"];
        $vno = $_POST["vno"];
        $bamt = $_POST["bamt"];

        mysqli_query($con, "insert into bill(bill_no, bill_date, request_id, vehicle_no, bill_amt) values($bid,'$bdate',$rid,'$vno',$bamt)");

        $sids = $_POST["sid"];
        for($i=0; $i < sizeof($sids); $i++){
            mysqli_query($con, "insert into bill_services values($bid,'$sids[$id]')");            
        }
?>
    <script language="javascript" type="text/javascript">
        alert("Bill posted successfully!!!")
        window.location="generate-bill.jsp";
        </script>    					


