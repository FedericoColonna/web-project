<?php 
    session_start();
?>


<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" type="text/css" href="styles.css">

<?php  

    print '<div id="mydiv2" class="topnav">';
    print '<a '.(($currentPage === "Home") ? ' class="active" ': '').' href="index.php">Home</a>';
    if(isset($_SESSION["userid"])) {
        print '<a '.(($currentPage === "Pizzas") ? ' class="active" ': '').' href="pizzas_page.php">Pizzas</a>';
        print '<a '.(($currentPage === "Profile") ? ' class="active" ': '').' href="show_profile.php">Profile</a>';
        print '<a '.(($currentPage === "Logout") ? ' class="active" ': '').' href="logout.php">Logout</a>';
        
    } else {
        print '<a '.(($currentPage === "SignUp") ? ' class="active" ': '').' href="registration.php">SignUp</a>';
        print '<a '.(($currentPage === "Login") ? ' class="active" ': '').' href="login.php">LogIn</a>';
        print '<a '.(($currentPage === "AboutUs") ? ' class="active" ': '').' href="aboutus_page.php">AboutUs</a>';
    }

    print '</div>';
?>
