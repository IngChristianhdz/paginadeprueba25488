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

 

    function fetchTasks() {
    $.ajax({
        url: 'conexion/task-list.php',
        type: 'GET',
        success: function(response) {
            try {
                // Eliminar el prefijo "Consumo" si existe
                const jsonStart = response.indexOf('[');
                const jsonString = jsonStart >= 0 ? response.substring(jsonStart) : response;
                
                const tasks = JSON.parse(jsonString);
                
                if (!Array.isArray(tasks)) {
                    throw new Error("La respuesta no es un array");
                }

                let template = '';
                tasks.forEach(task => {
                    const consumo = task.consumo || '';
                    $('#taskHist').val(consumo);
                    
                    const pagarBtn = parseFloat(task.total || 0) >= 1 ? 
                        `<button class="task-pagar btn btn-primary">Pagar</button>` : '';
                    
                    template += `
                        <tr taskId="${task.id || ''}">
                            <td>${task.id || 'N/A'}</td>
                            <td>${task.vence || 'N/A'}</td>
                            <td>${task.total || '0'}</td>
                            <td>${task.estatus || 'N/A'}</td>
                            <td>${pagarBtn}</td>
                            <td><button class="task-delete btn btn-danger">Eliminar</button></td>
                            <td><button class="task-item btn btn-info">Consumo</button></td>
                        </tr>
                    `;
                });
                
                $('#tasks').html(template);
                
                // Solo renderizar gráfico si hay datos válidos
                if (tasks.length > 0 && tasks[0].consumo) {
                    renderChart(tasks[0].consumo);
                }
            } catch (e) {
                console.error("Error procesando respuesta:", e);
                console.error("Respuesta completa:", response);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la petición:', status, error);
            console.error('Respuesta:', xhr.responseText);
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
            
            function testWithSampleData() {
    const sampleData = [{
        vence: "09/05/2025",
        total: 0,
        estatus: "PAGO REALIZADO",
        id: "TEST123",
        consumo: "0010203040506070809101112" // datos de ejemplo
    }];
    
    let template = '';
    sampleData.forEach(task => {
        template += `<tr>...`; // tu template aquí
    });
    $('#tasks').html(template);
    renderChart(sampleData[0].consumo);
}
            
    function renderChart(consumo) {
    // Limpiar el gráfico existente primero
    Plotly.purge('myDiv');
    
    if (!consumo || consumo.length < 10) { // Ajustado el mínimo requerido
        console.warn("Datos de consumo insuficientes o inválidos");
        return;
    }

    const y = [], x = [];
    try {
        for (let i = 0; i < 12; i++) {
            const yVal = parseFloat(consumo.substring((5 * i) + 1, (5 * i) + 5));
            const xVal = consumo.substring(59 + (3 * i) + 1, 59 + (3 * i) + 4);
            
            if (!isNaN(yVal)) {
                y.push(yVal);
                x.push(xVal || `M${i+1}`);
            }
        }
    } catch (e) {
        console.error("Error procesando datos de consumo:", e);
        return;
    }

    if (y.length === 0) {
        console.warn("No se encontraron valores numéricos válidos");
        return;
    }

    const trace1 = {
        type: 'bar',
        x: x,
        y: y,
        marker: {
            color: '#4cade6',
            line: { width: 1 }
        }
    };

    Plotly.newPlot('myDiv', [trace1], {
        title: 'Histórico de consumo',
        height: 400,
        font: { size: 11 }
    }, { responsive: true });
}
     
});
