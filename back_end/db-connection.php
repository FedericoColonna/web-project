 <?php
    $servername = "localhost";
    $username = "fede";
    $password = "1234";
    $databasename = "web_project";

    $conn =mysqli_connect($servername, $username, $password, $databasename);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
