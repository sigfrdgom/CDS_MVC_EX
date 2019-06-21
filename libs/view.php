<?php

    class View
    {
        function __construct()
        {
           // echo "<h1>Prueba las vistas que pertenezcan a acada controlador en su momento</h1>";
        }

        function render($nombre)
        {
            require_once "views/".$nombre.".php";
            // si nombre es igual a index.php se formatia la ubicacion views/index.php
        }

        
    }

?>
/*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <?= $titulo?>
    </h1>

    <div id="frm" style="border: 1px dotted blue;">

        <input type="hidden" id="id">
        <label for="txtNombre">Nombre</label>
        <input type="text" id="txtNombre" required> <br>
        <label for="txtApellido">Apellido</label>
        <input type="text" id="txtApellido" required> <br>

        <button id="btn" value="ingresar">Agregar</button>
        

    </div>
<br>
    <div>
        <!-- Creating a table -->
        <table style="border: dotted 1px blue">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody id="cuerpo">

            </tbody>
        </table>
    </div>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>

<?php foreach ($usuarios as $usuario) { ?>

    <tr>
        <td><?= $usuario->id ?></td>
        <td><?= $usuario->nombre ?></td>
        <td><?= $usuario->apellido ?></td>
        <td>
            <button class="btnEditar" value="<?= $usuario->id ?>"> Editar</button>
        </td>
        <td>
            <button class="btnEliminar" value="<?= $usuario->id ?>"> Eliminar</button>
        </td>
    </tr>

<?php } ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('UsuariosModel');
	}
	public function index()
	{
		$dato["titulo"]="Usuarios";
		$this->load->view('Usuarios/index',$dato);
	}
	// load data from database?
	public function recargar()
	{
		$data=['usuarios'=>$this->UsuariosModel->getAll()];
		$this->load->view('usuarios/tabla',$data);
	}
	// Metodo para registrar
	public function ingresar()
	{
		$data=[$_POST['nombre'],$_POST['apellido']];
		$this->usuariosModel->ingresar($data);
	}
}
window.addEventListener('load',recargar);

// Metodo recargar, para poder cargar la informacion
function recargar(){
    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
            asignarEventos();
        }
    };

    peticion.open('GET','usuarios/recargar');
    peticion.send();
}


// Contorlador de eventos
 function asignarEventos() {
    document.getElementById('btn').addEventListener('click',accion);

    var btnEdit=document.getElementsByClassName('btnEditar');
    var btnElim=document.getElementsByClassName('btnEliminar');

    for (var i = 0; i < btnEdit.length; i++) {
        btnEdit[i].addEventListener('click',actualizar);
        btnElim[i].addEventListener('click',eliminar);
    }

 }

function accion() 
{
    var nombre=document.getElementById('txtNombre').value;
    var apellido=document.getElementById('txtApellido').value;

    if (nombre == '' && apellido == '') {
        alert("llena los campos");
        return;
    } 

    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
            recargar();
            limpiar();
        }
    };

    peticion.open('POST','usuarios/ingresar');
    peticion.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    peticion.send('nombre='+nombre+'&apellido='+apellido);
}


function eliminar() 
{
    alert('acccion realizada eliminar'); 
}


function actualizar() 
{
    alert('acccion realizada editar'); 
}

function limpiar() {
    document.getElementById('txtNombre').value = '';
    document.getElementById('txtApellido').value = '';
}

*/
