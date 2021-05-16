<?php
error_reporting(0);

date_default_timezone_set("America/Costa_Rica");

$fechaRegreso = false;
$mensaje_renta = '';

$id_customer = $_GET['customer_id'];
$customer_name = $_GET['customer_name'];
$lastname = $_GET['lastname'];
$movie_id = $_GET['movie_id'];
$fecha_renta = $_GET['fecha_renta'];
$fecha_entrega = $_GET['fecha_entrega'];
$rentar = $_GET['rentar'];
$fechaEntrega = $_POST['fechaEntrega'];

if($rentar == 1){
    $mensaje = "AQUI ALQUILAMOS a $movie_id";
}

//$rentar = $_GET['rentar'];
if($rentar == 1){
    include('connection.php');

    $movie_name = '';
    $confirmacion = true;

    $query ="SELECT * FROM rent where customer_id = $id_customer";
    $sql = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($sql))
    {
        
        if($row["movie_id"] == $movie_id){
            $confirmacion = false;
            
        }
    }

    if($confirmacion){
    
    }else{
        
    }

    $query ="SELECT * FROM movie where movie_id = $movie_id";
    $sql = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($sql))
    {
        $movie_name = $row["movie_name"];
    }

    if($confirmacion){
        $query = "INSERT INTO rent values (0,'$id_customer','$movie_id', '$fecha_renta','$fecha_entrega', 'rentada')" ;
        $sql = mysqli_query($connection,$query);
        $mensaje_renta = "El cliente $customer_name ha rentado la película $movie_name correctamente!";
        $fechaEntrega = $fecha_entrega;
        
        echo " <script > ";
        echo " toastr.success('Insertada!'); ";
        echo " </script> ";
    }else{
        $mensaje_renta = "El cliente $customer_name ya tenía rentada la película $movie_name !";
        
    }

$fechaRegreso = true;

}

$id_customer = $_GET['customer_id'];
$customer_name = $_GET['customer_name'];
$lastname = $_GET['lastname'];




$diaDevolucion = 0;
$mesDevolucion = "0";
$anioDevolucion = "0000";
$fechaEntrega = date("Y-m-d H:i:s", strtotime($fechaEntrega));



$a = date("Y", strtotime($fechaEntrega));
if($a > 2000){
$diaDevolucion = date("d", strtotime($fechaEntrega));
$mesDevolucion = date("m", strtotime($fechaEntrega));
$anioDevolucion = date("Y", strtotime($fechaEntrega));
}
else if ($rentar == 1){
// poner fecha que viene del get
$diaDevolucion = date("d", strtotime($fecha_entrega));
$mesDevolucion = date("m", strtotime($fecha_entrega));
$anioDevolucion = date("Y", strtotime($fecha_entrega));
}
else{
    $diaDevolucion = 0;
    $mesDevolucion = "0";
    $anioDevolucion = "0000";
}

$mensaje='';

$hoy = date("Y-m-d");
$hoy = date("Y-m-d H:i:s", strtotime($hoy));

$diaActual = date("d");
$mesActual = date("m");
$anioActual = date("Y");



if($hoy < $fechaEntrega || $rentar == 1)
	{
	
    $fechaRegreso = true;
    $mensaje='';
	}else
		{
		
        $fechaRegreso = false;
        $mensaje='El día de devolución es menor al día de hoy, escoja uno posterior.';
		}


        $hoy = date("Y-m-d", strtotime($hoy));
        $fechaEntrega = date("Y-m-d", strtotime($fechaEntrega));


    
    if($daySelect > 0){
        $diaDevolucion = $daySelect;
    $mesDevolucion = $monthSelect;
    $anioDevolucion = $yearSelect;
    $fechaRegreso = true;
    }

    switch ($mesActual) {
        case 01:
            $mesActual="ENERO";
            break;
        case 02:
            $mesActual="FEBRERO";
            break;
        case 03:
            $mesActual="MARZO";
            break;
        case "04":
            $mesActual="ABRIL";
            break;
        case 05:
            $mesActual="MAYO";
            break;
        case 06:
            $mesActual="JUNIO";
            break;
         case 07:
            $mesActual="JULIO";
            break;
         
    }
    switch ($mesActual) {
        case "08":
            $mesActual="AGOSTO";
            break;
        case "09":
            $mesActual="SEPTIEMBRE";
            break;
        case "10":
            $mesActual="OCTUBRE";
            break;
        case "11":
            $mesActual="NOVIEMBRE";
            break;
        case "12":
            $mesActual="DICIEMBRE";
            break;
      
         
    }


////////////////////////////////////////////////////////////////////
$mensaje_cambio_renta = '';

$id_customer = $_GET['customer_id'];
$customer_name = $_GET['customer_name'];
$lastname = $_GET['lastname'];
$rent_id = $_GET['rent_id'];
$devolver = $_GET['devolver'];
$pelicula = $_GET['pelicula'];

$fechaRentaGet = $_GET['fechaRenta'];

$nuevaFechaEntrega = $_POST['nuevaFechaEntrega'];
if($nuevaFechaEntrega){
    


    if($fechaRentaGet < $nuevaFechaEntrega)
	{ 

        include('connection.php');


$query = "UPDATE rent set date_return = '$nuevaFechaEntrega'  WHERE customer_id = $id_customer and rent_status = 'rentada'";



$sql = mysqli_query($connection,$query);
    
	}else
		{
            // se pone un mensaje: la fecha de devolución es menor a la de renta.
		
        $mensaje_cambio_renta='El día de devolución es menor al día de la renta, escoja uno posterior.';
		}

}

if($devolver == 1){

    include('connection.php');
    
    $query = "UPDATE rent SET rent_status = 'devuelta' WHERE rent_id = $rent_id;" ;

    $sql = mysqli_query($connection,$query);
    $mensaje_cambio_renta = "El cliente $customer_name ha regresado la película $pelicula correctamente!";
   
}

    echo " <script > ";
    echo " toastr.success('Ya puede modificar los datos de $customer_name'); ";
    echo " </script> ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentas Atrasadas</title>
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
    <h2 align="center" class="text-primary"><b>Rentas Atrasadas Video Plaza Paraíso<b></h2>
    </div>

  </div>
</div>

<div class="container" style="width: 800px; margin-top: 1px;">
		
        <br>


    <?php echo "<p class='text-danger text-center'> $mensaje_cambio_renta </p>";?>



<div class="container" style="width: 800px; margin-top: 1px;">

        <?php
    echo "<h2 class='text-danger text-center'>Hoy es: $diaActual de $mesActual del $anioActual </h2>";
   ;
      ?>
 <br><br>
		<div class="container">
    
        <br>
        <div class="row">
             <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-primary">Cliente</th>
                <th class="text-primary">Película</th>
                <th class="text-primary">Fecha Renta</th>
                <th class="text-primary">Fecha Devolución</th>
                 
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      include("connection.php");
                  $count_rows = 0;
                  $fechaRenta;
                  $query ="SELECT R.rent_id as ID, M.movie_name as Pelicula, C.customer_name as Cliente, C.lastname as Apellido, R.date_rent as FechaRenta, R.date_return as FechaRegreso FROM customer as C, movie as M, rent as R where CURDATE() > date(R.date_return) and R.customer_id = C.customer_id and R.movie_id = M.movie_id and R.rent_status='rentada' and C.active=1";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {
                $count_rows = $count_rows+1;
                $fechaRenta = $row["FechaRenta"];
                $customerName = $row['Cliente'];
                $customerLastname = $row['Apellido'];
        	?>
            <tr>
                <td><?php echo "$customerName  $customerLastname";?></td>
                <td><?php echo $row["Pelicula"];?></td>
                <td><?php echo $row["FechaRenta"];?></td>
                <td><?php echo $row["FechaRegreso"];?></td>
                
               
                
             </tr>
            <?php } ?>
            
                             

        </tbody>
        
    </table>

		</div>
   
    </div>
    </div>
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