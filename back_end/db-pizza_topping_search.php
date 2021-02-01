<?php
    
    require_once 'db-connection.php';
   // $query1 = "SELECT @topping_id:=id FROM topping WHERE name ='pomodoro';";
    //$query2 = "SELECT @pizza_id:=pizza_id FROM pizza_topping WHERE topping_id=@topping_id;";
    //$query3 = "SELECT * FROM pizza WHERE id=@pizza_id;";
    if(isset($_POST['search'])){
       
        $pizza_name = $_POST['search'];
        //echo $pizza_name;
        $result = getPizzaInfo2($pizza_name);
        if(!empty($result)) {
            header("Location: ../index.php?error=none3");
        }
    }
    
    function getPizzaInfo($pizza_name) {
        GLOBAL $conn;
        if ($stmt = mysqli_prepare($conn, "SELECT name FROM pizza WHERE name LIKE ?")) {
            mysqli_stmt_bind_param($stmt, "s", $pizza_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $pizza_name);
            mysqli_stmt_fetch($stmt);
                    
            return compact('name');
        } else {
            return -1;
        }
    }

    function getPizzaInfo2 ($pizza_name){
        GLOBAL $conn;
        $sql = "SELECT name FROM pizza WHERE name LIKE ?";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $pizza_name);
        $stmt->execute();   
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
        echo $row['name']; 
        
        }
    
   } 
   
    









