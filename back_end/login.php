<?php   
    
    if(isset($_POST['login']))
    {
       echo '<script>console.log("here")</script>';
        
            require_once 'db-connection.php';
           
            $email = $_POST['email'];
            $password = $_POST['pass'];

            print $email;
            if(emptyLogin($email, $password)!==false){

                header("Location: ../loginpage.php?error=emptyinput");
                exit();
             }

            
            loginUser($conn, $email, $password);
            }

         else{

            header("Location: ../loginpage.php");
            exit();

         }   


                 //LogIn Functions 
                 function emailExists($conn, $email){

                  $sql = "SELECT * FROM user WHERE email = ?;";
                  $stmt = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt, $sql)) {
              
                      header("Location: ../signuppage.php?error=emailalreadyregistered");
                      exit();
                  }
               mysqli_stmt_bind_param($stmt, "s", $email);
               mysqli_stmt_execute($stmt);
              
               $resutlData = mysqli_stmt_get_result($stmt);
              
               if($row = mysqli_fetch_assoc($resutlData)){
                  return $row;
               }
               else {
                  $result = false;
                  return $result;
              
               }
              
               mysqli_stmt_close($stmt);
              
              }
     

                 function emptyLogin($email, $password){

                 

                  if(empty($email) || empty($password)) {
               
                    $result = true;
               
                  }
                  else{
               
                      $result = false;
               
                  }
                  return $result;
               }
               function loginUser($conn, $email, $password){
               
               $uidExists = emailExists($conn, $email);
               if($uidExists === false){
                  header("Location: ../loginpage.php?error=wronglogin");
                  exit();
               }
               $passwordHashed = $uidExists["hashed_password"];
               $checkPassword = password_verify($password, $passwordHashed);
               
               if ($checkPassword === false) {
               
                  header("Location: ../loginpage.php?error=wronglogin");
                  exit();
               
               }
               else if($checkPassword === true) {
               
                  session_start();
                  $_SESSION["userid"] = $uidExists["id"];
                  $_SESSION["email"] = $uidExists["email"];
               
                  header("Location: ../index.php");
                  exit();
               
               }
      
       

            }