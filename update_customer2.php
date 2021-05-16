<?php
error_reporting(0);
$customer_id = $_POST['id'];
$customer_doc = $_POST['customer_doc'];
$customer_name = $_POST['customer_name'];
$customer_lastname = $_POST['customer_lastname'];
$customerdirection = $_POST['customer_direction'];
$customer_phone = $_POST['customer_phone'];

include('connection.php');


$query = "UPDATE customer set customer_name = '$customer_name', lastname = '$customer_lastname',
address = '$customerdirection', phone = '$customer_phone' WHERE customer_id = $customer_id and number_doc = '$customer_doc'";


$sql = mysqli_query($connection,$query);
    
    include("clientes.php");
    echo " <script > ";
    echo " toastr.success('El cliente $customer_name ha sido actualizado correctamente!'); ";
    echo " </script> ";

mysqli_close($connection);

?>