<?php
error_reporting(0);
include('connection.php');
$charge_id = $_GET['charge_id'];
$customer = $_GET['customer'];
$customer_phone = $_GET['customer_phone'];
$charge_date = $_GET['charge_date'];
$detail = $_GET['detail'];
$advance = $_GET['advance'];
$total_amount = $_GET['total_amount'];
$status_charge = $_GET['status_charge'];
$write_by = $_GET['write_by'];
$write_by_name = $_GET['write_by_name'];
$find_by = $_GET['find_by'];
$find_by_name = $_GET['find_by_name'];


    echo " <script > ";
    echo " toastr.success('Ya puede modificar los datos del pedido de $customer'); ";
    echo " </script> ";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Video Plaza Paraíso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<?php
    include("menu.html");
?>
<body>

<div class="container p-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Editar Pedidos Video Plaza Paraíso<b></h2>
    </div>
  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
		
    <form action="update_charge2.php" method="POST">

    <?php         
       echo " <div class='form-group'> ";
       echo "     <label for='charge_id'>ID:</label> ";
       echo "         <input required type='text' placeholder='Digite el ID' class='form-control' name='charge_id' autocomplete='off' readonly value='$charge_id'>  ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer'>Cliente:</label> ";
       echo "         <input required type='text' placeholder='Digite el código' class='form-control' name='customer' autocomplete='off' readonly value='$customer'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer_phone'>Teléfono:</label> ";
       echo "         <input required type='text' placeholder='Digite el teléfono' class='form-control' name='customer_phone' autocomplete='off' value='$customer_phone'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='charge_date'>Fecha Pedido:</label> ";
       echo "         <input required type='text' placeholder='Digite la fecha del pedido' class='form-control' name='charge_date' autocomplete='off' readonly value='$charge_date'> ";
       echo "     </div> ";
       
       echo "     <div class='form-group'> ";
       echo "     <label for='detail'>Detalle/Pedido:</label> ";
       echo "         <textarea required type='text' placeholder='Digite el actor' class='form-control' name='detail' autocomplete='off' >$detail</textarea> ";
       echo "     </div> ";
       
       echo "     <div class='form-group'> ";
       echo "     <label for='advance'>Adelanto:</label> ";
       echo "         <input required type='number' placeholder='Digite el adelanto' class='form-control' name='advance' autocomplete='off'  value='$advance'> ";
       echo "     </div> ";
       
       echo "     <div class='form-group'> ";
       echo "     <label for='total_amount'>Monto total:</label> ";
       echo "         <input required type='number' placeholder='Digite el monto total' class='form-control' name='total_amount' autocomplete='off'  value='$total_amount'> ";
       echo "     </div> ";

    echo "  <div class='form-group'> ";
    echo "  <label for='status_charge'>Estado</label> ";
    echo "  <select class='form-control' name='status_charge'> ";
    ?>
    <option <?php if($status_charge == 'POR BUSCAR'){echo('selected');}?>>POR BUSCAR</option>
    <option <?php if($status_charge == 'LISTO'){echo('selected');}?>>LISTO</option>
    <option <?php if($status_charge == 'ENTREGADO'){echo('selected');}?>>ENTREGADO</option>
    <option <?php if($status_charge == 'NO ENCONTRADO'){echo('selected');}?>>NO ENCONTRADO</option>
    </select> 
    </div> 

    <div class="form-group">
    <label for="writer">Anotado Por:</label>
    <select class="form-control" name="writer">
    <?php
        
        $query ="SELECT * FROM users";
        $sql = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($sql))
        {
          ?>
         
         <option value="<?php echo $row["user_id"]?>" <?php if($write_by_name == $row["name"]){echo('selected');}?>> <?php echo $row["name"] ?></option>";
         
        
         <?php } ?>
         </select>
  </div>

  <div class="form-group">
    <label for="find">Buscado Por:</label>
    <select class="form-control" name="find">
    <?php
        
        $query ="SELECT * FROM users";
        $sql = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($sql))
        {
          ?>
         <option value="<?php echo $row["user_id"]?>" <?php if($find_by_name == $row["name"]){echo('selected');}?>> <?php echo $row["name"] ?></option>";
        
        
         <?php } ?>
         </select>
  </div>

            <div class='form-group'>
               <input type='submit' class='btn btn-success' value='Editar Pedido'>
           </div>
          
            </form>

</div>




</body>
    
<?php
    include("footer.html");
?>

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
    $('#example').DataTable();
} );
</script>

</html>