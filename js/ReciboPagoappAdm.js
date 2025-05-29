$(document).ready(function() {

    // $idUser = $_POST['name'];  + $idUser
    console.log('jQuery is Working');
    //  $('#task-result').hide();
    console.log('aqui algo pasa');

     $ids = '005533';
     console.log("id = "+ids);
    // fetchTasks();
    // fetchTasksM();
    //  consumotask();


    $('#search').keyup(function(e) {
       if($('#search').val()){
        // let search = [$('#search').val(),$('#taskCorreo').val()];
        let search = [$('#search').val()];
             $.ajax({
            url: 'conexion/task-search2.php',
            type: 'POST',
            data: { search },
            success: function(response) {
               let tasks = JSON.parse(response);
               let template = '';
               tasks.forEach(task => {
                    template += `<li>
                        ${task.name}  ${task.description}  ${task.pagolinea}
                    </li>`;
               });

               $('#container').html(template);
               $('#task-result').show();
            }
        });

       }
    });

    $('#task-form').submit(function(e){
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };
        let url ='conexion/task-editAdmin.php';
        $.post(url, postData, function (response){
           fetchTasks();
             $('#task-form').trigger('reset');
        });
        e.preventDefault();
    });


    // function consumotask(){
    //     consumo = $('#taskHist').val();
    //         console.log(consumo);
    //         y=Array();
    //         x=Array();
    //         for (var i = 0; i < 12; i++) {
    //             y[i]= consumo.substring((5*i)+1,(5*i)+5) ;
    //             x[i]= consumo.substring(59+(3*i)+1,59+(3*i)+4) ;
    //          }
    //         var trace1 = {
    //             type: 'bar',
    //             x,
    //             y,
    //             marker: {
    //                 color: '#4cade6',
    //                 line: {
    //                     width: 1
    //                 }
    //             }
    //           };

    //           var data = [ trace1 ];
    //           var layout = {
    //             title: 'Histórico de consumo',
    //             height: 400,
    //             font: {size: 11},
    //             plot_bgcolor: 'rgb(227,246,250)',
    //             margin: {pad:10},
    //             xaxis:{
    //                 title: 'mes de consumo',
    //                 titlefont:{
    //                     color: 'black',
    //                     size:8
    //                 },
    //                 rangemode:'tozero'
    //             },
    //             yaxis:{
    //                 title: 'consumo m3',
    //                 titlefont:{
    //                     color:'black',
    //                     size:8
    //                 },
    //                 rangemode:'tozero'
    //             }
    //           };

    //           var config = {responsive: true}

    //           Plotly.newPlot('myDiv', data, layout, config );

    // }

    // function fetchTasks(){
    //     $.ajax({
    //         url: 'conexion/task-listAdmin.php',
    //         type: 'GET',
    //         success: function(response) {
    //             let tasks = JSON.parse(response);
    //             let template = '';
    //             let template1 = '';
    //             tasks.forEach(task => {
    //                 template1 = '';
    //                 $('#taskHist').val(task.consumo);
    //                  if (task.total>=1){

    //                     template1=' <button class="task-pagar btn btn-primary" id="pagar">  Pagar  </button>';
    //                 }

    //                 template +=`
    //                 <tr taskId="${task.id}">
    //                     <td ><h6>${task.id}</h6></td>
    //                     <td ><h6>${task.vence}</h6></td>
    //                     <td > <h6> ${task.total} </h6> </td>
    //                     <td><h6>${task.estatus}</h6></td>
    //                     <td>
    //                     ${template1}
    //                     </td>
    //                     <td>
    //                         <button class="task-delete btn btn-danger">
    //                             Eliminar
    //                         </button>
    //                     </td>
    //                     <td>
    //                         <button class="task-item btn btn-info">
    //                            Consumo
    //                         </button>
    //                     </td>
    //                 </tr>
    //                 `
    //             });
    //             $('#tasks').html(template);
    //         }
    //     });
    // }

    // function fetchTasksM(){
    //     $.ajax({
    //         url: 'conexion/task-listMAdmin.php',
    //         type: 'GET',
    //         success: function(response) {
    //             let tasksM = JSON.parse(response);
    //             let template = '';
    //             let template1 = '';
    //             tasksM.forEach(task => {
    //                 template1 = '';
    //                 template +=`
    //                 <tr taskIdM="${task.respuesta}">
    //                     <td><h6>${task.respuesta}</h6></td>
    //                     <td><h6>${task.autoriza}</h6></td>
    //                     <td><h6>${task.estatus} </h6> </td>
    //                     <td><h6>${task.mensaje}</h6></td>
    //                 </tr>
    //                 `
    //             });
    //             $('#tasksM').html(template);
    //         }
    //     });
    // }

    $(document).on('click', '.task-delete', function() {
        if (confirm('Esta Seguro de Eliminar esta cuenta ?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');

             $.post('conexion/task-delete.php', {id}, function(response) {
            fetchTasks();
            })
        }
    })

    $(document).on('click','.task-item', function(){

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        console.log("id = "+id);
        let consumo;
        $.post('conexion/task-single.php', {id} , function(response) {
            const task = JSON.parse(response);
            $('#name').val(task.name);
            $('#description').val(task.description);
            $('#taskId').val(task.id);
            $('#taskHist').val(task.consumo);
            consumo = $('#taskHist').val();
            console.log(consumo);
            y=Array();
            x=Array();
            for (var i = 0; i < 12; i++) {
                y[i]= consumo.substring((5*i)+1,(5*i)+5) ;
                x[i]= consumo.substring(59+(3*i)+1,59+(3*i)+4) ;
             }
            var trace1 = {
                type: 'bar',
                 x,
                 y,
                marker: {
                    color: '#4cade6',
                    line: {
                        width: 1
                    }
                }
              };

              var data = [ trace1 ];
              var layout = {
                title: 'Historico de consumo',
                height: 400,
                font: {size: 11},
                plot_bgcolor: 'rgb(227,246,250)',
                margin: {pad:10},
                xaxis:{
                    title: 'mes de consumo',
                    titlefont:{
                        color: 'black',
                        size:8
                    },
                    rangemode:'tozero'
                },
                yaxis:{
                    title: 'consumo m3',
                    titlefont:{
                        color:'black',
                        size:8
                    },
                    rangemode:'tozero'
                }
              };

              var config = {responsive: true}

              Plotly.newPlot('myDiv', data, layout, config );

        })



    })


    $(document).on('click', '.task-pagar', function() {
      let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        let element1 = $(this)[0].parentElement.parentElement;
        let adeudo = $(element1).attr('taskvence');
        console.log(element1);
        let web='ConfirmarPago.php?cuenta2=';
        var res = web.concat(id);
        adeudo=0;

            if (confirm("Acepta los terminos y condiciones para inicar el proceso de pago en Linea?")){
                location.href= res;
                $('#pagar').hide();
              }
             $('#pagar').show();

    })


    $(document).on('click', '#cerrar', function() {
       if (confirm("Se cerrara la sesión, desea continuar?")){
               location.href="cerrar.php";
              }

     })



});