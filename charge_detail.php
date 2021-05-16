<?php
error_reporting(0);
$charge_id = $_GET['charge_id'];
$customer = $_GET['customer'];
$customer_phone = $_GET['customer_phone'];
$charge_date = $_GET['charge_date'];
$detail = $_GET['detail'];
$advance = $_GET['advance'];
$total_amount = $_GET['total_amount'];
$status_charge = $_GET['status_charge'];
$write_by = $_GET['write_by'];
$find_by = $_GET['find_by'];
$write_by_name = '';
$find_by_name = '';

include("connection.php");
$query ="SELECT * FROM users where user_id = $write_by" ;
$sql = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($sql))
{
  $write_by_name = $row["name"];
} 

$query ="SELECT * FROM users where user_id = $find_by" ;
$sql = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($sql))
{
  $find_by_name = $row["name"];
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pedido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body>

<?php
    include("menu.html");
    ?>

<div class="container" align="left">
    <img src="img/logo_video.png">
</div>
    
    <div align="center" class="container">
    <div class="card">
  <div class="card-header"><h2 class="text-primary"><?php echo "Encargo: $detail";?></h2></div>


  <div class="card-body">
  <form class="form-inline" role="form">
 
 <div class="form-group  p-2 m-2">
   <label  for="email"> <b> Cliente: </b></label>
   <input readonly type="text" class="form-control" id="email" value='<?php echo $customer;?>'>
 </div>
 <div class="form-group  p-2 m-2">
   <label  for="pwd"><b>Teléfono: </b></label>
   <input readonly type="text" class="form-control" id="pwd" value='<?php echo $customer_phone;?>'>
 </div>
 <div class="form-group p-2 m-2">
   <label  for="email"> <b>Fecha Pedido: </b></label>
   <input readonly type="text" class="form-control" id="email" value='<?php echo $charge_date ;?>'>
 </div>
</form>
<br><br>
<form class="form-inline" role="form">

<div class="form-group p-2">
   <label" for="pwd"><b>Adelanto:</b></label>
   <input readonly type="text" class="form-control" id="pwd" value='<?php echo $advance;?>'>
 </div>
 <div class="form-group p-2">
   <label  for="email"><b>Monto Total:</b></label>
   <input readonly type="text" class="form-control" id="email" value='<?php echo $total_amount;?>'>
 </div>
 <div class="form-group p-2">
   <label  for="pwd"><b>Estado:</b></label>
   <input readonly type="text" class="form-control" id="pwd" value='<?php echo $status_charge;?>'>
 </div>
</form>
<br><br>
<form class="form-inline" role="form">

<div class="form-group p-2">
   <label for="email"> <b>Anotado Por:</b></label>
   <input readonly type="text" class="form-control" id="email" value='<?php echo $write_by_name;?>'>
 </div>
 <div class="form-group p-2">
   <label  for="pwd"><b>Buscado Por:</b></label>
   <input readonly type="text" class="form-control" id="pwd" value='<?php echo $find_by_name;?>'>
 </div>
</form>
  
  </div>

  <div class="card-footer col-12" align="center">
  <form action="" class="form-inline" align="center">
  <div class="col-7 form-group" >
  <a href="update_pedido1.php?charge_id=<?php echo $charge_id; ?>&customer=<?php echo $customer;?>&customer_phone=<?php echo $customer_phone;?>&charge_date=<?php echo $charge_date;?>&detail=<?php echo $detail;?>&advance=<?php echo $advance;?>&total_amount=<?php echo $total_amount;?>&status_charge=<?php echo $status_charge;?>&write_by=<?php echo $write_by;?>&write_by_name=<?php echo $write_by_name;?>&find_by=<?php echo $find_by;?>&find_by_name=<?php echo $find_by_name;?>" class="btn btn-info m-auto pr-auto">EDITAR</a> 
    </div>
    <div class="col-5 form-group" >
    <a href="delete_charge.php?charge_id=<?php echo $charge_id;?>" class="btn btn-danger m-auto pr-auto" onClick="return confirm('Seguro que quiere borrar el pedido?')">ELIMINAR</a>
    </div>
  </form>
  </div>
</div>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable({
      "language": {
            "lengthMenu": "Presentando _MENU_ registros por página",
            "zeroRecords": "Sin resultados - lo siento",
            "info": "Presentando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate":{
              "next": "Siguiente",
              "previous": "Anterior"
            }
        }
      });
} );
</script>
</body>
</html>