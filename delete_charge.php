<?php
error_reporting(0);
$charge_id = $_GET['charge_id'];

include('connection.php');

if($charge_id != null || $charge_id != ''){

$query = "UPDATE charge set active = 0 where charge_id = $charge_id";

$sql = mysqli_query($connection,$query);


include("pedidos.php");
    echo " <script > ";
    echo " toastr.success('El pedido con ID $charge_id ha sido eliminado correctamente!'); ";
    echo " </script> ";

}else{
    include("pedidos.php");
    echo " <script > ";
    echo " toastr.warning('Elija un pedido para eliminar!'); ";
    echo " </script> ";
}

mysqli_close($connection);
?>