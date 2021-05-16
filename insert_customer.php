<?php
error_reporting(0);
$customer_doc = $_POST['customer_doc'];
$customer_name = $_POST['customer_name'];
$customer_lastname = $_POST['customer_lastname'];
$customerdirection = $_POST['customer_direction'];
$customer_phone = $_POST['customer_phone'];



$test = '';
include('connection.php');

$query ="SELECT * FROM customer where number_doc = '$customer_doc'";

$sql = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($sql))
{
    $test = $row["number_doc"];
}

if($test == null || $test = '' || $customer_doc != null || $customer_doc != ''){

$query = "INSERT INTO customer values (0,'$customer_doc','$customer_name', '$customer_lastname'
,'$customerdirection', '$customer_phone', 1)" ;


$sql = mysqli_query($connection,$query);

  // header("location:clientes.php");
    
    include("clientes.php");
    echo " <script > ";
    echo " toastr.success('El cliente $customer_name ha sido insertado correctamente!'); ";
    echo " </script> ";
   
}else{
   
    include("clientes.php"); 
   echo " <script > ";
   echo " toastr.error('No se insertó. Ya existe un cliente con esta cédula'); ";
   echo " </script> ";
}


mysqli_close($connection);

