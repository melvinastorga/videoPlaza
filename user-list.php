<?php
    error_reporting(0);
    include('connection.php');
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die('Query Failed!' . mysqli_error($connection));
    }else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name'         => $row['name'],
                'email'        => $row['email'],
                'password'     => $row['pass'],
                'active'       => $row['active'],
                'id'           => $row['user_id']
            );
        }
        $json_string = json_encode($json);
        echo $json_string;
    }
?>