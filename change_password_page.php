<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<title>Change Password</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php $currentPage = 'ChangePassword'; ?>
<?php include'commons/navbar.php';?>
<?php
    $user_email = $_SESSION['email'];
    echo $user_email; ?>

</head>
<body>
<div class="container">
  <div class="col-md-6 mx-auto text-center">
	 <div class="header-title">
		<h1 class="wv-heading--title">
		   Change your Password:
		</h1>
		<h7 class="wv-heading--subtitle">
		   First insert your old password, then type the new one you have chosen.
		</h7>
	 </div>
  </div>
  <div>
	 <div class="col-md-4 mx-auto">
		<div class="myform form">
		   <form action="/back_end/change_password.php" method="POST">
			  <div class="form-group">
				 <input readonly="readonly" type="email" name="email2"  class="form-control my-input" id="email2" placeholder="Email" value="<?php echo htmlspecialchars($user_email); ?>">
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
				 <button type="submit" name="passwordchange" class="btn btn-primary profile-button">Save Password</button>
			  </div>
		   </form>
		</div>
	 </div>
  </div>
</div>



</body>
</html>