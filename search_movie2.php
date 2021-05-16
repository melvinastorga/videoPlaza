<?php
    include('connection.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM movie WHERE movie_name LIKE '%$search%' OR movie_code LIKE '%$search%' OR actor LIKE '%$search%' and active = 1";
        $result = mysqli_query($connection, $query);
        if(!$result){
            //Si la consulta da error, mostramos el error
            die('Query Error' . mysqli_error($connection));
        }else{
            // Si todo sale bien, se crea una variable que asemeja un JSON
            // Se recorre todo loq ue traiga el select, se guarda en un array
            // Que guarda el nombre, la descripción y el ID de las tareas que coincidan con la búsqueda
            $json = array();
            while($row = mysqli_fetch_array($result)){
                $json[] = array(
                    'id'       => $row['movie_id'],
                    'movie_code' => $row['movie_code'],
                    'gender'     => $row['gender'],
                    'name'       => $row['movie_name'],
                    'spanish' => $row['spanish'],
                    'actor'     => $row['actor'],
                    'director'     => $row['director']
                );
            }
            // Lo convertimos a JSON
            $json_string = json_encode($json);
            echo $json_string;
        }
    }
?>