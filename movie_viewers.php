<?php
error_reporting(0);
date_default_timezone_set("America/Costa_Rica");
$movie_id = $_GET['movie_id'];
$movie_name = $_GET['movie_name'];
$today = date("Y-m-d");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viendo Película</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>

<?php
    include("menu.html");
    error_reporting(0);
    ?>

<div class="container p-2">
  <div class="row">
    <div class="col-md-3">
      <img src="img/logo_video.png">
    </div>
    <div class="col-md-9 contenedor">
    <h2 align="center" class="text-primary"><b>Clientes viendo <?php echo $movie_name;?><b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 1px;">
		
        <br>


<div class="container" style="width: 800px; margin-top: 1px;">

       
 <br><br>
		<div class="container">
    
        <br>
        <div class="row">
             <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-primary">Cliente</th>
                <th class="text-primary">Fecha Renta</th>
                <th class="text-primary">Fecha Devolución</th>
                <th class="text-primary">Estado</th> 
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      include("connection.php");
                  $count_rows = 0;
                  $fechaRenta;
                  $query ="SELECT R.rent_id as ID, M.movie_name as Pelicula, C.customer_name as Cliente, C.lastname as Apellido, R.date_rent as FechaRenta, R.date_return as FechaRegreso FROM customer as C, movie as M, rent as R where R.movie_id = $movie_id and R.customer_id = C.customer_id and R.movie_id = M.movie_id and R.rent_status='rentada'  and C.active=1";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {
                $FechaRegreso = $row["FechaRegreso"];
                $customerName = $row['Cliente'];
                $customerLastname = $row['Apellido'];
        	?>
            <tr>
                <td><?php echo "$customerName  $customerLastname";?></td>
                <td><?php echo $row["FechaRenta"];?></td>
                <td><?php echo $row["FechaRegreso"];?></td>
                <td>
                <?php
                if($FechaRegreso < $today){
                echo "<p class='text-danger'><b>ATRASADA</b></p>";
                }else{
                echo "AL DÍA";
                }
                ?>
                </td>
               
                
             </tr>
            <?php } ?>
            
                             

        </tbody>
        
    </table>

		</div>
   
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
<?php
    include("footer.html");
?>
</html>