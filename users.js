
$(function() {
    let edit = false;
    console.log('JQuery is working');
    //$('#task-result').hide();
    fetchTask();


   
    $('#user-form').submit(function(e){
        
        //Evitar que el submit refresque el html
        e.preventDefault();

        const postData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            id: $('#userId').val(),
        };

        console.log('el id que va para edit es ', postData.id);
        let url = edit === false ? 'user-add.php' : 'user-edit.php';

        $.post(url, postData, function (response){
            console.log(response);
            toast_message(response);
            fetchTask();
            edit = false;
           
        })

          //Otra forma para borrar los datos del formulario:
        // $('#task-form').trigger(reset');
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $("#modal_new_user").modal('close');
        
    
    });
    
    

    function fetchTask(){
    $.ajax({
        url: 'user-list.php',
        type: 'GET',
        success: function (response){
            let users = JSON.parse(response); 
            console.log(users);

            let template = '';

            users.forEach(user => {

                if(user.active == 1){

                template += ` <tr userID="${user.id}">

                <td>${user.id}</td>
                <td>${user.name}</td>
                
                <td>
                <button class='user-update btn btn-success'" data-toggle="modal" data-target="#modal_new_user">
                    Editar
                </button>
            </td>
                <td>
                    <button class='user-delete btn btn-danger'">
                        Eliminar
                    </button>
                </td>
                 
                   </tr>`
                }
            });

            $('#users').html(template);

        }
    })
}

// Para obtener el ID
//Se coloca una clase a cada botón Delete: task-delete
// Al presionarlo, obtengo el documento todos los click, pero que vengan con la clase task-delete
// Obtengo ese botón html con this[0]
// Eso está en un html btn, y tiene un padre que es el TD, y este a la vez tiene un padre
// Que sería el TR, la fila entera.
// Al obtener esa fila, vamos a buscar su primer TD, que contiene el ID, y obtenemos su valor.
// innerHTML: "2" El innerHTML tiene el valor.
$(document).on('click', '.user-delete', function(){

    var answer = window.confirm("¿Eliminar usuario?");
if (answer) {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('userID');
    console.log(id);

    $.post('user-delete.php', {id}, function (response){
        console.log(response);
        toast_message(response);
        fetchTask();
    })
}
else {
    
}

   
})



//EDIT
$(document).on('click', '.user-update', function(){

    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('userID');
    console.log(id);

    $.post('user-by-id.php', {id}, function (response){
        let user = JSON.parse(response); 
        console.log(user);
        
        $('#name').val(user.name);
        $('#email').val(user.email);
        $('#password').val(user.password);
        $('#userId').val(user.id);
        edit = true;
        let template = ` <b>Editar Usuario</b>`
        $('#modalTitle').html(template);
        $('#btn-form').val('Editar');
    })

})


$(document).on('click', '.user-add', function(){
    edit = false;
    
    let template = ` <b>Nuevo Usuario</b>`
    $('#modalTitle').html(template);
    $('#btn-form').val('Agregar');
    
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#userId').val('');

})

function toast_message(mensaje){
     toastr.success(mensaje);
}

});