<?php
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['name'])){
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        

        $query = "UPDATE users set name = '$name', email = '$email', pass = '$password' where user_id = $id";
       
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed.'); 
        }

        echo "El usuario $name ha sido actualizado exitosamente";
    }

    $response = $_POST['response'];

    
?>