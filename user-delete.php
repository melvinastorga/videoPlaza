<?php
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['id'])){
        $id =  $_POST['id'];
        
        $query2 = "SELECT * FROM users where user_id = $id";
        $result2 = mysqli_query($connection, $query2);
        
        while($row = mysqli_fetch_array($result2)){
           
        $name= $row['name'];
            
        }

        $query = "UPDATE users set active = 0 where user_id = $id";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed.'); 
        }

        echo "El usuario $name ha sido eliminado exitosamente";
    }

    
    
?>