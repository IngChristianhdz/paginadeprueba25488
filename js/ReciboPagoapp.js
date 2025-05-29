$(document).ready(function() {
    console.log('jQuery is Working');
    $('#task-result').hide();
    fetchTasks();
    fetchTasksM();
    //consumotask();
    
    $('#search').keyup(function (e) {
        const query = $('#search').val();
        if (query) {
            const search = [query, $('#taskCorreo').val()];
            $.ajax({
                url: 'conexion/task-search.php',
                type: 'POST',
                data: { search },
                success: function (response) {
                    const tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(task => {
                        template += `<li>${task.name} - ${task.description} - ${task.pagolinea}</li>`;
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                },
                error: function () {
                    console.error('Error en búsqueda');
                }
            });
        }
    });
   
      // Guardar tarea
    $('#task-form').submit(function (e) {
        e.preventDefault();
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };
        $.post('conexion/task-edit.php', postData, function () {
            fetchTasks();
            $('#task-form').trigger('reset');
        });
    });
     
   function consumotask() {
    const consumo = $('#taskHist').val();
    renderChart(consumo); // Reutilizamos la misma función
}

 

    function fetchTasks(){
        $.ajax({
            url: 'conexion/task-list.php',
             type: 'GET',
            success: function (response) {
                const tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                   // $('#taskHist').val(task.consumo); // Para gráfico inicial
                    const pagarBtn = task.total >= 1 ? `<button class="task-pagar btn btn-primary">Pagar</button>` : '';
                    template += `
                        <tr taskId="${task.id}">
                            <td><h6>${task.id}</h6></td>
                            <td><h6>${task.vence}</h6></td>
                            <td><h6>${task.total}</h6></td>
                            <td><h6>${task.estatus}</h6></td>
                            <td>${pagarBtn}</td>
                            <td><button class="task-delete btn btn-danger">Eliminar</button></td>
                            <td><button class="task-item btn btn-info">Consumo</button></td>
                        </tr>
                    `;
                });
                $('#tasks').html(template);
                //renderChart($('#taskHist').val()); // Mostrar gráfico inicial
            },
            error: function () {
                console.error('Error al obtener tareas');
            }
        });
    }

    function fetchTasksM(){
        $.ajax({
            url: 'conexion/task-listM.php',
            type: 'GET',
            success: function(response) {
                let tasksM = JSON.parse(response);
                let template = '';
                let template1 = '';
                tasksM.forEach(task => {
                    template1 = '';
                    template +=`
                    <tr taskIdM="${task.respuesta}">
                        <td><h6>${task.respuesta}</h6></td>
                        <td><h6>${task.autoriza}</h6></td>
                        <td><h6>${task.estatus} </h6> </td>
                        <td><h6>${task.mensaje}</h6></td>                        
                    </tr>
                    `
                });
                $('#tasksM').html(template);
            }
        });
    }

    $(document).on('click', '.task-delete', function() {
        if (confirm('Esta Seguro de Eliminar esta cuenta ?')){
             const id = $(this).closest('tr').attr('taskId');
            $.post('conexion/task-delete.php', { id }, function () {
                fetchTasks();
            });
        }
    });

   

 $(document).on('click', '.task-pagar', function () {
        const id = $(this).closest('tr').attr('taskId');
        const url = `ConfirmarPago.php?cuenta2=${id}`;
        if (confirm("¿Acepta los terminos y condiciones para iniciar el proceso de pago en linea?")) {
            window.location.href = url;
            $('#pagar').hide();
        }
        $('#pagar').show();
    });


    
    
    

    $(document).on('click', '#cerrar', function() {
       if (confirm("Se cerrara la sesi贸n, desea continuar?")){
               location.href="cerrar.php";                
              } 
            
            })
             
     
});
