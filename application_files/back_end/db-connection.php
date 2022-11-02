 <?php
    $servername = "localhost";
    $username = "S3257597";
    $password = "FffMmm117";
    $databasename = "S3257597";

    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
