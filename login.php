<?php
error_reporting(0);
$email = $_POST['email'];
$password_form = $_POST['password'];
session_start();
$_SESSION['user']=$email;

include('connection.php');

$query = "SELECT * FROM users where email= '$email' and pass = '$password_form'" ;
$result = mysqli_query($connection,$query);

$row = mysqli_num_rows($result);

if($row){
    header("location:clientes.php");
    ?>
   <script >
    toastr.success('Ha iniciado sesión');
    </script>
    
    

    <?php
}
else{
    ?>
    <?php
    include("index.php");
    ?>
    <script >
    toastr.error('ERROR EN LA AUTENTIFICACIÓN');
    </script>
    <?php
}
mysqli_free_result($result);
mysqli_close($connection);

