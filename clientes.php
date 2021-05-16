

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
    error_reporting(0);
    include("menu.html");
    include("connection.php");
    $count_customers = 0;
    
  $result = mysqli_query($connection, "SELECT COUNT(*) AS count FROM customer where active = 1");
  $row = mysqli_fetch_array($result);
  $count_customers = $row['count'];
  

?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Clientes Video Plaza Paraíso<b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
    <br>
    <h4 align="center" class="text-primary"><b>Cantidad de clientes registrados: <?php echo $count_customers; ?><b></h4>
    <br>
    <a  class="btn btn-success text-light" data-toggle="modal" data-target="#modal_new_customer" id="newCustomer"><b>Nuevo Cliente</b></a><br><br>
    <br>
    <div class="row">
             <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                
                <th class="text-primary">Cédula</th>
                <th class="text-primary">Nombre</th>
                <th class="text-primary">Apellido</th>
                <th class="text-primary">Dirección</th>
                <th class="text-primary">Teléfono</th>
                <th class="text-primary">Rentar</th>
                <th class="text-primary">Editar</th>
                <th class="text-primary">Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	     
                  $query ="SELECT * FROM customer where active = 1";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                
                <td><?php echo $row["number_doc"];?></td>
                <td><?php echo $row["customer_name"];?></td>
                <td><?php echo $row["lastname"];?></td>
                <td><?php echo $row["address"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><a class="btn btn-success" href="renta.php?customer_id=<?php echo $row['customer_id']; ?>&customer_name=<?php echo $row['customer_name'];?>&lastname=<?php echo $row['lastname'];?>"> RENTAR</a> </td>

                <td><a href="update_customer1.php?customer_id=<?php echo $row['customer_id']; ?>&number_doc=<?php echo $row['number_doc'];?>&customer_name=<?php echo $row['customer_name'];?>&lastname=<?php echo $row['lastname'];?>&address=<?php echo $row['address'];?>&phone=<?php echo $row['phone'];?>" class="btn btn-info"  data-target="#modal_update_customer">EDITAR</a> </td>

                <td><a href="delete_customer.php?customer_id=<?php echo $row['customer_id'];?>" class="btn btn-danger" onClick="return confirm('¿Seguro que quiere eliminar al cliente?')">ELIMINAR</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
        
    </table>

		</div>
	</div>

<br><br><br>

<div class="modal fade" id="modal_new_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Cliente</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insert_customer.php" method="POST">
            
        <div class="form-group">
            <input required type="text" placeholder="Digite la cédula" class="form-control" name="customer_doc" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="text" placeholder="Digite el nombre" class="form-control" name="customer_name" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="text" placeholder="Digite el apellido" class="form-control" name="customer_lastname" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="text" placeholder="Digite la dirección" class="form-control" name="customer_direction" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="text" placeholder="Digite el teléfono" class="form-control" name="customer_phone" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Registrar Cliente">
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>



<body>
    
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
<script src="customer.js"></script>
</body>
</html>