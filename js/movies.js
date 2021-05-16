
$(function() {
    
    console.log('JQuery is working');
    
    
    $('#search-form').submit(function(e){
        //Evitar que el submit refresque el html
        // const postData = {
        //     name: $('#name').val(),
        //     description: $('#description').val(),
        //     id: $('#taskId').val(),
        // };

        // console.log('el id que va para edit es ', postData.id)
        // let url = edit === false ? 'task-add.php' : 'task-edit.php';

        // $.post(url, postData, function (response){
        //     console.log(response);
        //     fetchTask();
        //     edit = false;
        // })

       

        // $('#name').val('');
        // $('#description').val('');

        //Otra forma para borrar los datos del formulario:
        // $('#task-form').trigger(reset');
        
            
        let search = $('#search').val();
        
       if(search == ''){
           console.log("vacio");
       }else{
        $.post('search_movie2.php', {search}, function (response){
            let movies = JSON.parse(response); 
            console.log(movies);
            
            let template = '';

            movies.forEach(movie => {
                let spanish = '';
                if(movie.spanish==0){
                    spanish= 'NO';
                }else if(movie.spanish==1){
                    spanish = 'SÍ';
                }else{
                    spanish = 'SIN REVISAR';
                }
                template += ` <tr>
                <td>
                <a href="movie_viewers.php?movie_id=${movie.id}&movie_name=${movie.name}" class="task-item">
                ${movie.movie_code}</td>
                </a>
                <td>${movie.name}</td>
                <td>${movie.gender}</td>
                <td>${spanish}</td>
                <td>${movie.actor}</td>
                <td>${movie.director}</td>
                <td>
                <a href="update_movie1.php?movie_id=${movie.id}&movie_code=${movie.movie_code}&movie_name=${movie.name}&movie_gender=${movie.gender}&movie_spanish=${movie.spanish}&movie_actor=${movie.actor}&movie_director=${movie.director}" class='task-delete btn btn-success'>
                        EDITAR
                    </a>
                </td>
                <td>
                <a href="delete_movie.php?movie_id=${movie.id}" class='btn btn-danger' onClick="return confirm('Seguro que quiere eliminar la película?')">
                    ELIMINAR
                </a>
            </td>
                 
                   </tr>`
            });

            $('#movies').html(template);
        })

       

        $('#name').val('');
       }
        e.preventDefault();
    });

    //buscamos lo que tenga el id search #
  

    //buscamos lo que tenga el id search #
  

    
   

    

// Para obtener el ID
//Se coloca una clase a cada botón Delete: task-delete
// Al presionarlo, obtengo el documento todos los click, pero que vengan con la clase task-delete
// Obtengo ese botón html con this[0]
// Eso está en un html btn, y tiene un padre que es el TD, y este a la vez tiene un padre
// Que sería el TR, la fila entera.
// Al obtener esa fila, vamos a buscar su primer TD, que contiene el ID, y obtenemos su valor.
// innerHTML: "2" El innerHTML tiene el valor.



//EDIT

$('#movie-rent-form').submit(function(e){
       
    let search = $('#search').val();
    
   if(search == ''){
       console.log("vacio");
   }else{
    $.post('search_movie2.php', {search}, function (response){
        let movies = JSON.parse(response); 
        console.log(movies);
        
        let template = '';

        movies.forEach(movie => {
          let customerId =  $('#customer_id').val();
          let customerName = $('#customer_name').val(); 
          let customerLastname = $('#customer_lastname').val(); 
          let rentDate =  $('#rent_date').val();
          let returnDate =  $('#return_date').val();

            let spanish = '';
            if(movie.spanish==0){
                spanish= 'NO';
            }else if(movie.spanish==1){
                spanish = 'SÍ';
            }else{
                spanish = 'SIN REVISAR';
            }
            template += ` <tr>
            <td>
            <a href="movie_viewers.php?movie_id=${movie.id}&movie_name=${movie.name}" class="task-item">
            ${movie.movie_code}
            </a></td>
            <td>${movie.name}</td>
            <td>${movie.gender}</td>
            <td>${spanish}</td>
            <td>${movie.actor}</td>
            <td>${movie.director}</td>
            
            <td> <a  class="btn btn-success text-light" href="renta.php?customer_id=${customerId}&customer_name=${customerName}&lastname=${customerLastname}&movie_id=${movie.id}&fecha_renta=${rentDate}&fecha_entrega=${returnDate}&rentar=${1}" ><b>RENTAR</b> </a></td>
            
             
               </tr>`
        });

        $('#movies').html(template);
    })

   

    $('#name').val('');
   }
    e.preventDefault();
});


});