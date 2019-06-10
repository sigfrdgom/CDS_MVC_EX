<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Alumnos</title>
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>
</head>
<body>
<?php require 'views/header.php'; ?>
    
    <div id="main" class="center"><h1>Listado de Alumnos</h1>
        <a href="<?php echo constant('URL')?>alumno/newRegister" class='btn-a' >NUEVO ALUMNO</a>
    </div>


      <div id="main" class="center">
           <table class="table" id="alumnos">
                <thead >
                    <tr >
                        <td class="head">ID</td>
                        <td class="head">NOMBRE</td>
                        <td class="head">APELLIDO</td>
                        <td class="head">TELEFONO</td>
                        <td class="head">OPCIONES</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once 'models/alumnos.php';
                        foreach ($this->alumnos as $item) {
                            $alm=new Alumnos();
                            $alm=$item;
                            echo "
                            <tr id='fila-".$alm->id."'>
                                <td class='cell'> $alm->id </td>
                                <td class='cell'> $alm->nombre </td>
                                <td class='cell'> $alm->apellido </td>
                                <td class='cell'> $alm->telefono </td>
                                <td class='cell'>
                                    <button class='btn-d' onclick='elimina(".$alm->id.")'>Eliminar</button>
                                    <a class='btn-e' href='".constant('URL')."alumno/getById/".$alm->id."' title='¿Desea editar el registro?'>EDITAR</a>
                                    
                                </td>
                            </tr>";
                        }
                    ?>
                    
                </tbody>

           </table>
       </div>
       
<?php require 'views/footer.php'; ?>
</body>
</html>