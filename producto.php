<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Se incluye la librería jQuery -->
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <title>Administración de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333333;
            margin: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="hidden"] {
            display: none;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #1abc9c;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #16a085;
        }

        #mostrarRegistros {
            margin-top: 20px;
        }

        #mostrarBusqueda {
            margin-top: 20px;
        }

        #mostrarFormularioModificacion {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<form id="formdatos" method="POST">
    <!-- Campos para ingresar datos del producto -->
    <label for="Id_planta">Id Planta</label> 
    <input type="text" name="Id_planta" id="Id_planta"><br>
    <label for="Nombre_planta">Nombre Planta</label> 
    <input type="text" name="Nombre_planta" id="Nombre_planta"><br>
    <label for="Descripcion">Descripción</label>
    <input type="text" name="Descripcion" id="Descripcion"><br>
    <label for="precio">Precio</label> 
    <input type="text" name="Precio" id="precio"><br>
    <label for="Tipo">Tipo</label> 
    <input type="text" name="Tipo" id="Tipo"><br>
    <label for="Imagen">Imagen</label> 
    <input type="text" name="Imagen" id="Imagen"><br>
    <!-- Campos ocultos para ID a modificar o eliminar -->
    <input type="hidden" name="Id_modificar" id="Id_modificar">
    <input type="hidden" name="Id_eliminar" id="Id_eliminar">
    <br>
    <!-- Botones para ejecutar operaciones CRUD -->
    <button id="btnguardar">Insertar</button>
    <button id="btnmodificar">Modificar</button>
    <button id="btneliminar">Eliminar</button>
</form>

<br>
<!-- Botón para mostrar registros -->
<button id="btnmostrar">Mostrar registros</button>
<br>
<!-- Contenedor para mostrar registros -->
<div id="mostrarRegistros"></div>
<!-- Contenedor para el formulario de modificación -->
<div id="mostrarFormularioModificacion"></div>

<br>
<!-- Formulario para buscar un registro -->
<form id="formbuscar" method="POST">
    <br><br>
    <label for="id_buscar">Id Planta a buscar:</label>
    <input type="text" name="id_buscar" id="id_buscar"><br>
    <br>
    <button id="btnbuscar">Buscar</button>
</form>
<br>
<a href="admin.php" class="button"><button>Regresar</button></a>
<!-- Contenedor para mostrar el resultado de la búsqueda -->
<div id="mostrarBusqueda"></div>

<script type="text/javascript">
    $(document).ready(function(){
        // Función para cargar los registros al hacer clic en el botón "Mostrar registros"
        $('#btnmostrar').click(function(){
            $('#mostrarRegistros').load('mostrar.php');
        });

        // Función para insertar un nuevo registro
        $('#btnguardar').click(function(){
            var datos=$('#formdatos').serialize();
            $.ajax({
                type:"POST",
                url:"insertar.php",
                data:datos,
                success:function(r){
                    if (r==1) {
                        alert("Registro exitoso");
                        $('#mostrarRegistros').load('mostrar.php');
                    }else{
                        alert("Fallos en el registro");
                    }
                }
            });
            return false;
        });

        // Función para buscar un registro por ID
        $('#btnbuscar').click(function(){
            var id_buscar = $('#id_buscar').val();

            if (id_buscar.trim() === '') {
                alert('Ingrese un ID de producto para buscar.');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "buscar.php",
                data: { id: id_buscar },
                success: function(datos) {
                    $('#mostrarBusqueda').html(datos);
                }
            });

            return false;
        });

        // Función para modificar un registro
        $('#btnmodificar').click(function(){
            var id_modificar = prompt("Ingrese el ID del producto a modificar:");
            if (id_modificar !== null) {
                $.ajax({
                    type: "POST",
                    url: "formulario_modificar.php",
                    data: { id: id_modificar },
                    success: function(formulario) {
                        // Desvincular el evento de envío del formulario anterior (si existe)
                        $('#formModificar').off('submit');

                        // Limpiar y mostrar el formulario de modificación
                        $('#mostrarFormularioModificacion').html(formulario).show();

                        // Vincular evento al formulario de modificación para el botón Guardar
                        $('#formModificar').submit(function(event) {
                            event.preventDefault(); // Evitar el envío del formulario por defecto
                            var datos = $(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "guardar_modificacion.php",
                                data: datos,
                                success: function(r) {
                                    if (r == 1) {
                                        alert("Modificación exitosa");
                                        $('#mostrarRegistros').load('mostrar.php');
                                        $('#mostrarFormularioModificacion').html('').hide(); // Limpiar y ocultar el formulario de modificación
                                    } else {
                                        alert("Fallos en la modificación");
                                    }
                                }
                            });
                        });
                    }
                });
            }
            return false;
        });

        // Función para eliminar un registro
        $('#btneliminar').click(function(){
            var id_eliminar = prompt("Ingrese el ID del producto a eliminar:");
            if (id_eliminar !== null) {
                $('#Id_eliminar').val(id_eliminar);
                if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                    $.ajax({
                        type:"POST",
                        url:"eliminar.php",
                        data:$('#formdatos').serialize(),
                        success:function(r){
                            if (r==1) {
                                alert("Eliminación exitosa");
                                $('#mostrarRegistros').load('mostrar.php');
                            }else{
                                alert("Fallos al eliminar");
                            }
                        }
                    });
                }
            }
            return false;
        });
    });
</script>

</body>
</html>
