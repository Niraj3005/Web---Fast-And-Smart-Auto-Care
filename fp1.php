<?php include "connect.php"?>

<?php
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$rs = mysqli_query($con, "select * from mechanic where email='$email'");
		if($row = mysqli_fetch_row($rs)){
			$header = "From:ajitmore1977@gmail.com \r\n";
         	$header .= "MIME-Version: 1.0\r\n";
         	$header .= "Content-type: text/html\r\n";

			mail ($email,'Recover password','Your password is '.$row[1],$header);
?>
<script type="text/javascript">
	alert('Password sent to email successfully.');
	location.href = 'ml.php';
</script>
<?php
		}
		else{
?>
<script type="text/javascript">
	alert('Email not found');
	location.href = 'ml.php';
</script>
<?php		

		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Auto care</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="stylesheet" type="text/css" href="css/fp.css">
</head>	
<body>

<div class="form-container">
    <form method="POST" class="form-wrap">
        <h2>Forgot Password</h2>
        <div class="form-box"> 
            <input type="email" id="Sender" name="email" placeholder="Enter Email " required>
        </div>
        <div class="form-submit">   
           <button type="submit" name="submit">Send</button>
        </div>
    </form>
</div>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</body>
</html>	