<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo registro</title>
</head>
<body>
<?php require 'views/header.php'; ?>
    
    <div id="main" class="center"><h1>Nuevo registro de alumno</h1></div>
        <form action="<?php echo constant('URL');?>alumno/insert" method="post">
            <table class="center" style="padding:20px;">
                <tr>
                    <td style="padding:10px;" class="derecha">
                        <label for="nombre" >Nombres:</label>
                    </td>
                    <td style="text-align: left">
                        <input type="text" name="nombre" id="nombre">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;" class="derecha">
                        <label for="apellido" >Apellidos:</label>
                    </td>
                    <td style="text-align: left">
                        <input type="text" name="apellido" id="apellido">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;" class="derecha">
                        <label for="telefono" class="derecha">Telefono:</label>
                    </td>
                    <td style="text-align: left">
                        <input type="text" name="telefono" id="telefono">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <input type="submit" value="Registrar" class="btn-a">
                        <a href="<?php echo constant('URL')?>alumno" class="btn-d">REGRESAR</a>
                    </td>

                </tr>
            </table>
        </form>
    </div>
       
<?php require 'views/footer.php'; ?>
</body>
</html>