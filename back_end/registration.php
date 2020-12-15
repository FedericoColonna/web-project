<?php
    
      if(isset($_POST['submit']))
      {
         require_once 'db-connection.php';
       
         $firstname = trim($_POST['firstname']);
         $lastname= trim($_POST['lastname']);
         $email= trim($_POST['email']);
         $password = trim($_POST['pass']);
         $confirm= trim($_POST['confirm']);
       


         if(emptySignup($firstname, $lastname, $email, $password, $confirm)!==false){

            header("Location: ../signuppage.php?error=emptyinput");
            exit();
         }
         if(invalidUid1($firstname)!==false){

            header("Location: ../signuppage.php?error=invalidfirstname");
            exit();
         }
         if(invalidUid2($lastname)!==false){

            header("Location: ../signuppage.php?error=invalidlastname");
            exit();
         }
         if(invalidEmail($email)!==false){

            header("Location: ../signuppage.php?error=invalidemail");
            exit();
         }
         if(passwordMatch($password, $confirm)!==false){

           header("Location: ../signuppage.php?error=pwdwrongmatch");
          
           exit();
         }
         if(emailExists($conn, $email)!==false){

            header("Location: ../signuppage.php?error=stmtfailed");
            exit();
         }



      }
      else {
            header("Location: ../signuppage.php");

      }
      createUser($conn, $email, $password, $firstname, $lastname);



//SignUp FUNCTIONS  


function emptySignup($firstname, $lastname, $email, $password, $confirm){

    
    if(empty($email) || empty($password) || empty($firstname) || empty($lastname) || empty($confirm)){

      $result = true;

    }
    else{

        $result = false;

    }
    return $result;
}
function invalidUid1($firstname){
        
       
        if(!preg_match("/^[a-zA-Z]*$/", $firstname)){

            $result = true;
 
        }
        else{

            $result = false;
        }
        return $result;

}
function invalidUid2($lastname){

  
    if(!preg_match("/^[a-zA-Z]*$/", $lastname)) {

        $result = true;

    }
    else{

        $result = false;
    }
    return $result;

}
function invalidEmail($email){

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function passwordMatch($password, $confirm) {


    if($password !== $confirm) {
        
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
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
function createUser($conn, $email, $password, $firstname, $lastname){

    $sql = "INSERT INTO user (email, hashed_password, first_name, last_name) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../signuppage.php?error=stmtfailed");
        exit();

    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $email, $hashed_password, $firstname, $lastname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signuppage.php?error=none");
    exit();

}
