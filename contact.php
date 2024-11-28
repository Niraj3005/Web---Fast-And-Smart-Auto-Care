<?php include "connect.php"?>

<?php
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    mysqli_query($con, "insert into contact(name, email, message) values('$name', '$email', '$message')");
?>
<script type="text/javascript">
  alert("Thanks for contacting us. Soon we will come back to you.");
  location.href = "ul.php";
</script>
<?php
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto care</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="css/c.css">
  </head>
  <body>
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>D. Y. Patil Educational Complex, Akurdi, Sector 29, Ravet Village Rd, Gurudwara Colony, Nigdi, Pimpri-Chinchwad, Maharashtra 411035</div>
        <div><i class="fas fa-envelope"></i>vehicleassistance01@gmail.com</div>
        <div><i class="fas fa-phone"></i>+91 72619 90434</div>
        <div><i class="fas fa-clock"></i>Mon - Fri 8:00 AM to 5:00 PM</div>
      </div>
      <div class="contact-form">
        <h2>Contact Us</h2>
        <form class="contact" method="post">
          <input type="text" name="name" id="Name" class="text-box" placeholder="Your Name" required>
          <input type="email" name="email" id="Sender" class="text-box" placeholder="Your Email" required>
          <textarea name="message" id="Message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
   
   <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>

  </body>

</html>
      