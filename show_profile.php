<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<title>Profile</title> 
<link rel="stylesheet" href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
 crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<?php $currentPage = 'Profile'; ?>
<?php include'commons/navbar.php';?>

<?php 

include_once 'back_end/db-connection.php';
$user_email = $_SESSION['email'];
$sql = "SELECT* FROM users WHERE email = $user_email;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){

    $row = mysqli_fetch_assoc($result);

    echo $row;



}



?>
</head>
<body>

<div class="container rounded profilediv mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://i.imgur.com/0eg0aG0.jpg" width="90"><span class="font-weight-bold">John Doe</span><span>john_doe12@bbb.com</span><span>United States</span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>Back to home</h6>
                    </div>
                    <h6 class="text-right">Edit your profile:</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="first name" value="John"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="Doe" placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="+19685969668" placeholder="Phone number"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
                </div>
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
