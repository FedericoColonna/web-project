<?php 
session_start();
?>


<link rel="stylesheet" type="text/css" href="signupstyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<?php  

    // $urls = array(
    //     'Home' => 'index.php',
    //     'SignUp' => 'signuppage.php',
    //     'Login' => 'loginpage.php',
    //     'Reserved' => 'reserved.php',
    //     'Profile' => 'show_profile.php',
    //     'Logout' => 'logout.php'
    // );

    // $sectionVisibleFlags = array(
    //     'Home' => true,
    //     'SignUp' => true,
    //     'Login' => true,
    //     'Reserved' => false,
    //     'Profile' => false,
    //     'Logout' => false
    // );
    
    print '<div id="mydiv2" class="topnav">';
    print '<a '.(($currentPage === "Home") ? ' class="active" ': '').' href="index.php">Home</a>';
    if(isset($_SESSION["userid"])) {
        print '<a '.(($currentPage === "Reserved") ? ' class="active" ': '').' href="reserved.php">Reserved</a>';
        print '<a '.(($currentPage === "Profile") ? ' class="active" ': '').' href="show_profile.php">Profile</a>';
        print '<a '.(($currentPage === "Logout") ? ' class="active" ': '').' href="logout.php">Logout</a>';
        
    } else {
        print '<a '.(($currentPage === "SignUp") ? ' class="active" ': '').' href="signuppage.php">SignUp</a>';
        print '<a '.(($currentPage === "Login") ? ' class="active" ': '').' href="loginpage.php">Login</a>';
    }
    // foreach ($urls as $name => $url) {
    //     //$isHome = $name === 'Home';
    //     echo("<script>console.log('PHP name: " . $name . "');</script>");
    //     echo("<script>console.log('PHP isLoggedIn: " . $isLoggedIn . "');</script>");
    //     echo("<script>console.log('PHP boolean: " . $sectionVisibleFlags[$name] . "');</script>");

    //     $isVisible = $isLoggedIn && !$sectionVisibleFlags[$name];
    //     echo("<script>console.log('PHP result: " . $isVisible . "');</script>");

    //     print '<a '
    //         .(!$isVisible ? 'style="display: none;"' : '')
    //         .(($currentPage === $name) ? ' class="active" ': '')
    //         .' href="'.$url.'">'
    //         .$name.
    //         '</a>';
    // }
    print '</div>';
?>
