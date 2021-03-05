<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Profile</title> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<?php $currentPage = 'Profile'; ?>
<?php 
    include'commons/navbar.php';
    if (!isset($_SESSION['userid'])) {
            header("Location: logout.php");
            exit;
}
?>
<?php 
    require_once 'back_end/db-user.php';
    require_once 'back_end/db-pizza.php';
    require_once 'back_end/db-topping.php';
    $email = $_SESSION['email'];
    echo $email;
    $user = getUser($email);  
    echo '<br>'; 
    echo $user['phone_number']; 
    echo '<br>'; 
    print_r($user);
?>
</head>
<body>
<div class="container rounded profilediv mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://i.imgur.com/0eg0aG0.jpg" width="90">
            <span class="font-weight-bold"><?php echo htmlspecialchars($user["first_name"]);echo'&nbsp';echo htmlspecialchars($user["last_name"]); ?></span>
            <span><?php echo htmlspecialchars($user["email"]); ?></span>
            <span><?php echo htmlspecialchars($user["country"]); ?></span><span>
            <button type="button" class="btn btn-primary profile-button" onclick="location.href='change_password_page.php';">Change Password</button></span></div>
        </div>
        <div class="col-md-8">
            <form action="/back_end/update_profile.php" method="POST">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6><a href="index.php">Back to Home<--<a></h6>
                    </div>
                    <h6 class="text-right">Edit your profile:</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><input type="text" name="firstname" class="form-control" placeholder="first name" value="<?php echo htmlspecialchars($user["first_name"]); ?>"></div>
                    <div class="col-md-6"><input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($user["last_name"]); ?>" placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo htmlspecialchars($user["email"]); ?>"></div>
                    <div class="col-md-6"><input type="text" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($user["phone_number"]); ?>" placeholder="Phone number"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" name="address" class="form-control" placeholder="address" value="<?php echo htmlspecialchars($user["address"]); ?>"></div>
                    <div class="col-md-6"><input type="text" name="country" class="form-control" value="<?php echo htmlspecialchars($user["country"]); ?>" placeholder="country"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" name="nickname" class="form-control" placeholder="Nickname" value="<?php echo htmlspecialchars($user["nickname"]); ?>"></div>
                    <div class="col-md-6"><input type="text" name="zipcode" class="form-control" value="<?php echo htmlspecialchars($user["zipcode"]); ?>" placeholder="Zip Code"></div>
                </div>
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" name="update" type="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
