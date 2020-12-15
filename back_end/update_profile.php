<php


$servername = "localhost";
$username = "fede";
$password = "1234";
$databasename = "web_project";




$conn=mysqli_connect($servername, $username, $password, $databasename);

if(!$conn){

die("Connection failed: ". mysqli_connect_error());

}

if(isset($_POST['update']))
{
    
    
       
         $first_name = trim($_POST['firstname']);
         $last_name= trim($_POST['lastname']);
         $email= trim($_POST['email']);


}

$sql = "UPDATE `users` SET `firstname`='"$firstname"',`lastname`='"$lastname"',`email`= $email WHERE `email` = $email";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
