<?php
 
    if (isset($_POST['submit'])) {
        include_once '../application_files/back_end/be-change_password.php'; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Change Password</title>
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php $currentPage = 'ChangePassword'; ?>
<?php include'../application_files/commons/navbar.php';?>
<?php
    $user_email = $_SESSION['email'];
?>

</head>
<body>
<div class="container">
  <div class="col-md-6 mx-auto text-center">
	 <div class="header-title">
		<h1 class="wv-heading--title">
		   Change your Password:
		</h1>
		<h7 class="wv-heading--subtitle">
		    Type the new password you have chosen and confirm it.
		</h7>
	 </div>
  </div>
  <div>
	 <div class="col-md-4 mx-auto">
		<div class="myform form">
		   <form action="change_password_page.php" method="POST">
			  <div class="form-group">
				 <input type="email" name="email2"  class="form-control my-input" id="email2" placeholder="Email" value="<?php echo htmlspecialchars($user_email); ?>" readonly>
			  </div>
              <div class="form-group">
				 <input type="password" name="old"  class="form-control my-input" id="oldpassword" placeholder="Old Password">
			  </div>
			  <div class="form-group">
				 <input type="password" name="new"  class="form-control my-input" id="newpassword" placeholder="New Password">
			  </div>
			  <div class="form-group">
				 <input type="password" name="confirmnew" id="confirmnewpassword"  class="form-control my-input" placeholder="Confirm New Password">
			  </div>
			  <div class="text-center ">
				 <button type="submit" name="submit" class="btn btn-primary profile-button">Save Password</button>
			  </div>
		   </form>
		</div>
	 </div>
  </div>
</div>



</body>
</html>