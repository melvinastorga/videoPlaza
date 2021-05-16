<?php
    error_reporting(0);
    include('connection.php');

    if(isset($_POST['id'])){
        $id =  $_POST['id'];

    $query = "SELECT * FROM users where user_id = $id";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die('Query Failed!' . mysqli_error($connection));
    }else{
        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name'        => $row['name'],
                'email'       => $row['email'],
                'password'    => $row['pass'],
                'id'          => $row['user_id']
            );
        }
        $json_string = json_encode($json[0]);
        echo $json_string;
    }
}
?>