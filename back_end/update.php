<?php




if(isset($_POST['update']))
{
    
    
         //include_once 'back_end/db-connection.php';
         $first_name = trim($_POST['firstname']);
         $last_name= trim($_POST['lastname']);
         $email= trim($_POST['email']);


      }
      else{

        header("Location: ../show_profile.php");

      }

      updateUser($conn, $email, $firstname, $lastname);







      function updateUser($conn, $email, $firstname, $lastname){

        $query = "UPDATE `users` SET `fname`='".$firstname."',`lname`='".$lastname."',`email`= $email WHERE `email` = $email";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)) {
    
            header("Location: ../show_profile.php?error=stmtfailed");
            exit();
    
        }
        header("Location: ../show_profile.php?error=none");
    }