<link rel="stylesheet" type="text/css" href="styles.css">
<?php
    session_start();
    session_unset();
    session_destroy();
    
    //header("Location: index.php");
?>
<div class="container rounded profilediv mt-5">
    <h1>You've been logged out!</h1>
    <h3>Go back <a href="index.php">HOME</a> or <a href="login_page.php">LogIn</a> again.</h3>
</div>
