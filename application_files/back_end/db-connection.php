 <?php
    $servername = "";
    $username = "";
    $password = "";
    $databasename = "";

    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
