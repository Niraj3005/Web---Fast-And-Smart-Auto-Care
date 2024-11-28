<?php include "connect.php"?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/ur.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
<body>
<?php 
        $sname = $_POST["sname"];
        $fname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $lat = $_POST["lat"];
        $lon = $_POST["lon"];

        mysqli_query($con, "update mechanic set password='$password',service_center_name='$sname',mechanic_fullname='$fname',address='$address',email='$email',phone='$phone',latitude=$lat,longitude=$lon where username='$username'");
?>
<script language="javascript" type="text/javascript">
    alert("Profile updated successfully!!!")
    window.location="mh.php";
</script>    					
