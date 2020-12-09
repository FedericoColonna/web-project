<?php 
session_start();
?>

<link rel="stylesheet" href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
        <?php  
            print '<li class="nav-item active">';
            print '<a class="nav-link" href="index.php">Home';
            print '<span class="sr-only">(current)</span>';
            print '</a>';
            print '</li>';
            if(isset($_SESSION["userid"])) {
                print '<li class="nav-item">';
                print '<a class="nav-link" href="reserved.php">Reserved</a>';
                print '</li>';
                print '<li class="nav-item">';
                print '<a class="nav-link" href="show_profile.php">Profile</a>';
                print '</li>';
                print '<li class="nav-item">';
                print '<a class="nav-link" href="logout.php">Logout</a>';
                print '</li>';
            } else {
                print '<li class="nav-item">';
                print '<a class="nav-link" href="signuppage.php">SignUp</a>';
                print '</li>';
                print '<li class="nav-item">';
                print '<a class="nav-link" href="loginpage.php">Login</a>';
                print '</li>';
            }
        ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>