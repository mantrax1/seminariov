
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  
    
    <title>listar</title>


</head>
 

<body> 
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>modelo</th>
                <th>nombre</th>
                <th>presentacion</th>
               
            </tr>
        </thead>
        <tbody>
             </tbody>

    </table>

    <script>
        $(document).ready(function() {
                 $('#example').DataTable( {
                   "ajax":{
                       "url":"https://personalab.herokuapp.com/consultar_articulos.php",
                       "dataSrc":""
                        },
                        "columns":[
                                {"data": "modelo"},
                                {"data": "nombre"},
                                {"data": "presentacion"}
                                      ]

                            } );
                                    } );
    </script>

</body>
</html>
