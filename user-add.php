<?php
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['name'])){
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        $query = "INSERT INTO users VALUES (0, '$email', '$password', '$name',1)";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query Failed.'); 
        }

        echo "El usuario $name ha sido insertado exitosamente";
    }

    $response = $_POST['response'];

    
?>