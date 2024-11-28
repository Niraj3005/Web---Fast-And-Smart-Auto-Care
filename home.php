<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
<body>
  <input type="checkbox" id="check">
  <header>
   <label for="check">
    <i class="fa fa-bars" id="sidebar_btn"></i>
   </label>
   <div class="left_area">
    <h3> Auto care</h3>
   </div>
   <div class="right_area">
    <a href="index.php" class="logout_btn">Logout</a>
   </div>
  </header>
  <div class="sidebar">
   <center>
    <img src="images/1.jpg" class="profile_image" alt="">
    <h5></h5>
   </center>
   <a href="home.php"><i class="fa fa-home"></i><span>Home</span></a>
   <a href="view-user-profile.php"><i class="fa fa-user-circle"></i><span>My Profile</span></a>
   <a href="add-feedback.php"><i class="fa fa-comments"></i><span>Feedback</span></a>
   <a href="request-service.php"><i class="fa fa-car"></i><span>Request Service</span></a>
   <a href="pay-bill.php"><i class="fa fa-credit-card"></i><span>Payment</span></a>
   <a href="bill-history.php"><i class="fa fa-file-invoice"></i><span>Bill History</span></a>
   </div>
   <div class="content" style="padding: 100px">
     <img src="images/user-home.jpeg">
   </div>
  </body>
</html>