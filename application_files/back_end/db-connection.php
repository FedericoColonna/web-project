 <?php
    $servername = "ftpupload.net";
    $username = "epiz_32911410";
    $password = "aKCPitIvkIZ";
    $databasename = "epiz_32911410_pizza";

    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
