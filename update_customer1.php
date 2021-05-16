<?php
error_reporting(0);
$id_customer = $_GET['customer_id'];
$number_doc = $_GET['number_doc'];
$customer_name = $_GET['customer_name'];
$lastname = $_GET['lastname'];
$address = $_GET['address'];
$phone = $_GET['phone'];

    echo " <script > ";
    echo " toastr.success('Ya puede modificar los datos de $customer_name'); ";
    echo " </script> ";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Video Plaza Paraíso</title>
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
    <h2 align="center" class="text-primary"><b>Editar Clientes Video Plaza Paraíso<b></h2>
    </div>
  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
		
    <form action="update_customer2.php" method="POST">

    <?php         
       echo " <div class='form-group'> ";
       echo "     <label for='id_customer'>ID:</label> ";
       echo "         <input required type='text' placeholder='Digite el ID' class='form-control' name='id' autocomplete='off' readonly value='$id_customer'>  ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer_doc'>Cédula:</label> ";
       echo "         <input required type='number' placeholder='Digite la cédula' class='form-control' name='customer_doc' autocomplete='off' readonly value='$number_doc'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer_name'>Nombre:</label> ";
       echo "         <input required type='text' placeholder='Digite el nombre' class='form-control' name='customer_name' autocomplete='off' value='$customer_name'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
      echo "     <label for='customer_lastname'>Apellido:</label> ";
       echo "         <input required type='text' placeholder='Digite el apellido' class='form-control' name='customer_lastname' autocomplete='off' value='$lastname'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer_direction'>Dirección:</label> ";
       echo "         <input required type='text' placeholder='Digite la dirección' class='form-control' name='customer_direction' autocomplete='off' value='$address'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "     <label for='customer_phone'>Teléfono:</label> ";
       echo "         <input required type='number' placeholder='Digite el teléfono' class='form-control' name='customer_phone' autocomplete='off' value='$phone'> ";
       echo "     </div> ";
       echo "     <div class='form-group'> ";
       echo "         <input type='submit' class='btn btn-success' value='Editar Cliente'> ";
       echo "     </div> ";
            ?>
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
<script src="customer.js"></script>

</html>