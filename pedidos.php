

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
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<?php
    include("menu.html");
    include("connection.php");
    error_reporting(0);
    $count_charges = 0;
    
  $result = mysqli_query($connection, "SELECT COUNT(*) AS count FROM charge where active = 1");
  $row = mysqli_fetch_array($result);
  $count_charges = $row['count'];
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Pedidos Video Plaza Paraíso<b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 10px;">
		
    <h4 align="center" class="text-primary"><b>Cantidad de pedidos registrados: <?php echo $count_charges; ?><b></h4>
    <br>
    <a  class="btn btn-success text-light" data-toggle="modal" data-target="#modal_new_charge"><b>Nuevo Pedido</b></a><br><br>
    <br>   
    <div class="row">
             <table id="example" class="display table-sm" style="width:100%">
        <thead>
            <tr>
                <th class="text-primary">Cliente</th>
                <th class="text-primary">Teléfono</th>
                <th class="text-primary">Fecha</th>
                <th class="text-primary">Detalle</th>
                <th class="text-primary">Adelanto</th>
                <th class="text-primary">Monto Total</th>
                <th class="text-primary">Estado</th>
                <th class="text-primary">DETALLES</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      
                  $query ="SELECT * FROM charge where active = 1";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {
                  
        	?>
            <tr>
                
                <td><?php echo $row["customer"];?></td>
                <td><?php echo $row["customer_phone"];?></td>
                <td><?php echo $row["charge_date"];?></td>
                <td><?php echo $row["detail"];?></td>
                <td><?php echo $row["advance"];?></td>
                <td><?php echo $row["total_amount"];?></td>
                <td><?php echo $row["status_charge"];?></td>
                <td>
                <a href="charge_detail.php?charge_id=<?php echo $row['charge_id']; ?>&customer=<?php echo $row['customer'];?>&customer_phone=<?php echo $row['customer_phone'];?>&charge_date=<?php echo $row['charge_date'];?>&detail=<?php echo $row['detail'];?>&advance=<?php echo $row['advance'];?>&total_amount=<?php echo $row['total_amount'];?>&status_charge=<?php echo $row['status_charge'];?>&write_by=<?php echo $row['write_by'];?>&find_by=<?php echo $row['find_by'];?>" class="btn btn-info">DETALLES</a> 
                </td>
               
            </tr>
            <?php } ?>
            
        </tbody>
        
    </table>

		</div>
	</div>

    <div class="modal fade" id="modal_new_charge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Pedido</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insert_charge.php" method="POST">
            
        <div class="form-group">
            <input required type="text" placeholder="Digite el nombre del cliente" class="form-control" name="charge_customer" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="number" placeholder="Digite el teléfono del cliente" class="form-control" name="charge_phone" autocomplete="off">
        </div>
        <div class="form-group">
        <textarea class="form-control" name="charge_detail" placeholder="Escriba el pedido aquí" rows="3" autocomplete="off"></textarea>
        </div>
        <div class="form-group">
            <input required type="number" placeholder="Adelanto de pago:" class="form-control" name="charge_advance" autocomplete="off">
        </div>
        <div class="form-group">
            <input required type="number" placeholder="Digite el monto total" class="form-control" name="charge_total" autocomplete="off">
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
         <option value="<?php echo $row["user_id"]?>">   <?php echo $row["name"] ?></option>";
        
        
         <?php } ?>
       
      
    </select>
  </div>
       
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Registrar Pedido">
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
</body>
</html>