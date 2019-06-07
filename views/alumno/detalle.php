<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
</head>
<body>
<?php require 'views/header.php'; ?>
    
    <div id="main" class="center"><h1>Alumnos</h1></div>
        <form action="<?php constant('URL');?>update" method="post">

            <table class="center" style="padding:20px;">
                <tr>
                    <td style="padding:10px;">
                        <label for="nombre">Nombre</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $this->alumno->nombre;?>">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">
                        <label for="apellido">Apellidos</label>
                    </td>
                    <td>
                        <input type="text" name="apellido" id="apellido" value="<?php echo $this->alumno->apellido;?>">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">
                        <label for="telefono">Telefono</label>
                    </td>
                    <td>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $this->alumno->telefono;?>">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <input type="submit" value="Guardar" class="btn-a">
                        <a href="<?php echo constant('URL')?>alumno" class="btn-d">CANCELAR</a>
                    </td>

                </tr>
            </table>

        </form>

    </div>
       
<?php require 'views/footer.php'; ?>
</body>
</html>