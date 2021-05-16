
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
            echo "entree xD";
        }
    }

    if($confirmacion){
    echo "esta es la confirmacion  $confirmacion";
    }else{
        echo "no hay confirmacion para insertar renta"; 
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
        echo "fechaEntrega es $fechaEntrega";
    }else{
        $mensaje_renta = "El cliente $customer_name ya tenía rentada la película $movie_name !";
        echo "no entre 2";
    }

$fechaRegreso = true;

}

$id_customer = $_GET['customer_id'];
$customer_name = $_GET['customer_name'];
$lastname = $_GET['lastname'];


echo "fecha calendario: $fechaEntrega";

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
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentas Video Plaza Paraíso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
</head>

<?php
    include("menu.html");
    if($rentar == 1){
        echo " <script > ";
        echo " toastr.success('El cliente $customer_name ha rentado la película con ID $movie_id correctamente!'); ";
        echo " </script> ";
    }
?>

<body>

<div class="container" align="left">
    <img src="img/logo_video.png">
    <a  class="btn btn-success text-light" href="renta.php?customer_id=<?php echo $id_customer; ?>&customer_name=<?php echo $customer_name;?>&lastname=<?php echo $lastname;?>" ><b>Regresar</b></a><br><br>

    <?php echo "<p class='text-danger text-center'> $mensaje_renta </p>";?>

</div>

<div class="container" style="width: 800px; margin-top: 100px;">
		<h3 align="center" class="text-primary"><b>Seleccione las películas que quiere rentar el cliente: <?php echo "$customer_name $lastname" ?> <b></h3>

        <?php
    echo "<p class='text-danger text-center'>Hoy es: $diaActual de $mesActual del $anioActual </p>";
    echo "<br>";
    echo "<p class='text-danger text-center'>La fecha de devolución establecida es: $diaDevolucion de $mesDevolucion del $anioDevolucion </p>";
    echo "<p class='text-danger text-center'> $mensaje </p>";
      ?>

		<div class="container">
        <div class="row  m-auto pr-auto" style="display: inline-block">
        <form action="nuevaRenta.php?customer_id=<?php echo $id_customer; ?>&customer_name=<?php echo $customer_name;?>&lastname=<?php echo $lastname;?>" method="POST">
        
        <div class="form-group  m-auto pr-auto" style="display: inline-block">
        <input type="date" name="fechaEntrega">
    </div>

    <div class="form-group" style="display: inline-block">
            <input type="submit" class="btn btn-success" value="Establecer Fecha Devolución">
        </div>

    </form>
    </div>
        </div>

        <div class="row">
        
             <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-primary">ID</th>
                <th class="text-primary">Código</th>
                <th class="text-primary">Nombre</th>
                <th class="text-primary">Género</th>
                <th class="text-primary">Español</th>
                <th class="text-primary">Actor</th>
                <th class="text-primary">Director</th>
                <th class="text-primary">Rentar</th>
                
                
            </tr>
        </thead>
        <tbody>
        	<?php
                if($fechaRegreso){
        	      include("connection.php");
                  $query ="SELECT * FROM movie";
                  $sql = mysqli_query($connection,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                <td><?php echo $row["movie_id"];?></td>
                <td><?php echo $row["movie_code"];?></td>
                <td><?php echo $row["movie_name"];?></td>
                <td><?php echo $row["gender"];?></td>
               <td>
               <?php
                if( $row["spanish"] == true){
                    echo "SÍ";
                }else{
                    echo "NO";
                }
                ?>
                </td>
                <td><?php echo $row["actor"];?></td>
                <td><?php echo $row["director"];?></td>
                
                <td> <a  class="btn btn-success text-light" href="nuevaRenta.php?customer_id=<?php echo $id_customer; ?>&customer_name=<?php echo $customer_name;?>&lastname=<?php echo $lastname;?>&movie_id=<?php echo $row['movie_id']; ?>&fecha_renta=<?php echo $hoy; ?>&fecha_entrega=<?php echo $fechaEntrega; ?>&rentar=<?php echo true ?>" ><b>RENTAR</b> </a>  </td>
            </tr>
            <?php }}?>
            
        </tbody>
        
    </table>

		</div>
	</div>

    <br><br><br>

   
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
   
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
</body>
</html>



