<?php
error_reporting(0);
ini_set('date.timezone', 'America/Costa_Rica');

$charge_customer = $_POST['charge_customer'];
$charge_phone = $_POST['charge_phone'];
$charge_detail = $_POST['charge_detail'];
$charge_advance = $_POST['charge_advance'];
$charge_total = $_POST['charge_total'];
$date = date('Y-m-d',time());
$writer = $_POST['writer'];



include('connection.php');


$query = "INSERT INTO charge values (0,'$charge_customer','$charge_phone','$date',
'$charge_detail',$charge_advance, $charge_total, 'POR BUSCAR', $writer, 6,1)";


$sql = mysqli_query($connection,$query);

    
    include("pedidos.php");
    echo " <script > ";
    echo " toastr.success('El pedido de $charge_customer ha sido insertado correctamente!'); ";
    echo " </script> ";


mysqli_close($connection);

