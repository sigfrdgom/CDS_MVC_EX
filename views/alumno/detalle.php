<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>
</head>
<body>
<?php require 'views/header.php'; ?>
    
    <div id="main" class="center"><h1>Alumnos detalle</h1>
        <form action="<?php echo constant('URL');?>alumno/update" method="post" id="guardar_update">

            <table class="center" style="padding:20px;">
                <tr>
                    <td style="padding:10px;">
                        <label for="nombre">Nombre</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo $this->alumno->nombre;?>">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">
                        <label for="apellido">Apellidos</label>
                    </td>
                    <td>
                        <input type="text" name="apellido" value="<?php echo $this->alumno->apellido;?>">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">
                        <label for="telefono">Telefono</label>
                    </td>
                    <td>
                        <input type="text" name="telefono"  value="<?php echo $this->alumno->telefono;?>">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <input  type="button" value="Guardar" class="btn-a" id="guardar_editar" onclick="update();">
                        <a style='display:inline-block;' href="<?php echo constant('URL')?>alumno" class="btn-d">REGRESAR</a>
                    </td>

                </tr>
            </table>

        </form>

    </div>
    </div>
       <div id="resp" style="text-align: center"></div>
    
<?php require 'views/footer.php'; ?>
</body>
</html>
