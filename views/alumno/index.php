<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Alumnos</title>
    <!-- <script src="<
        ?php echo constant('URL');?>public/js/main.js"></script> -->
</head>
<body>
<?php require 'views/header.php'; ?>
    
    <div id="main" class="center"><h1>Listado de Alumnos</h1>
        <!-- <a href="<
            ?php echo constant('URL')?>alumno/newRegister" class='btn-a' >NUEVO ALUMNO</a> -->
        <button onclick="document.getElementById('id01').style.display='block'" class="btn-a btn-especial">Nuevo alumno</button>
    </div>


      <div id="main" class="center">
           <table class="table" id="alumnos">
                <thead id="header" >
                    <tr >
                        <td class="head">ID</td>
                        <td class="head">NOMBRE</td>
                        <td class="head">APELLIDO</td>
                        <td class="head">TELEFONO</td>
                        <td class="head">OPCIONES</td>
                    </tr>
                </thead>
                <div id="cont">
                <tbody id="listaAlumnos">
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
                                    <a class='btn-e' style='display:inline-block;'  href='".constant('URL')."alumno/getById/".$alm->id."' title='¿Desea editar el registro?'>EDITAR</a> 
                                </td>
                            </tr>";
                        }
                    ?>
                    
                </tbody>
                </div>

           </table>
       </div>
<!-- <a class='btn-e' href='".constant('URL')."alumno/getById/".$alm->id."' title='¿Desea editar el registro?'>EDITAR</a> -->
  <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button> -->
  <!-- <button onclick=\"document.getElementById('id01').style.display='block'; getById(".$alm->id.")\" class='btn-e'>Editar</button> -->

<div id="id01" class="w3-modal">
<div class="w3-modal-content">
    <div class="w3-container">
    <!-- <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span> -->
    <h3 style="text-align: center">Agregar / Modificar alumno</h3>
 
    <form action="<?php echo constant('URL');?>alumno/insert" method="post">

        <table class="center" style="padding:20px;">
            <tr>
                <td style="padding:10px;">
                    <label for="nombre">Nombre</label>
                </td>
                <td>
                    <input type="text" name="nombre" id="nombre" required>
                </td>
            </tr>
            <tr>
                <td style="padding:10px;">
                    <label for="apellido">Apellidos</label>
                </td>
                <td>
                    <input type="text" name="apellido" id="apellido" required >
                </td>
            </tr>
            <tr>
                <td style="padding:10px;">
                    <label for="telefono">Telefono</label>
                </td>
                <td>
                    <input type="text" name="telefono" id="telefono" required>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <input type="submit" value="Guardar" class="btn-a">
                    <input type="reset" class="btn-d" onclick="document.getElementById('id01').style.display='none'" value="Salir">
                    <!-- <a class="btn-d" onclick="document.getElementById('id01').style.display='none'">Cancelar</a> -->
                    <!-- <a href="<?php echo constant('URL')?>alumno" class="btn-d">CANCELAR</a> -->
                </td>

            </tr>
        </table>

    </form>
    </div>
</div>
</div>
<div id="contenedor">

</div>
       
<?php require 'views/footer.php'; ?>
</body>
</html>