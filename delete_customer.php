<?php
error_reporting(0);
$id_customer = $_GET['customer_id'];

include('connection.php');

if($id_customer != null || $id_customer != ''){

$query = "UPDATE customer set active = 0 where customer_id = $id_customer";

$sql = mysqli_query($connection,$query);


include("clientes.php");
    echo " <script > ";
    echo " toastr.success('El cliente con ID $id_customer ha sido eliminado correctamente!'); ";
    echo " </script> ";

}else{
    include("clientes.php");
    echo " <script > ";
    echo " toastr.warning('Elija un cliente para eliminar!'); ";
    echo " </script> ";
}

mysqli_close($connection);
?>