<?php
error_reporting(0);
$charge_id = $_POST['charge_id'];
$customer_phone = $_POST['customer_phone'];
$customer = $_POST['customer'];
$detail = $_POST['detail'];
$advance = $_POST['advance'];
$total_amount = $_POST['total_amount'];
$status_charge = $_POST['status_charge'];
$writer = $_POST['writer'];
$find = $_POST['find'];


include('connection.php');


$query = "UPDATE charge set customer_phone = '$customer_phone', detail = '$detail',
advance = $advance, total_amount = '$total_amount', status_charge = '$status_charge',
write_by = $writer, find_by = $find WHERE charge_id = $charge_id";



$sql = mysqli_query($connection,$query);
    
    include("pedidos.php");
    echo " <script > ";
    echo " toastr.success('El pedido de $customer ha sido actualizado correctamente!'); ";
    echo " </script> ";

mysqli_close($connection);

?>