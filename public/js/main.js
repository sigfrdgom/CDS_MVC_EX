var ruta = 'http://localhost/mvc/';

function elimina(idAlumno) {
var r = confirm("¿Desea eliminar este registro? "+ idAlumno);
  if (r == true) {
    
    var req=ruta+"alumno/delete/"+idAlumno;
      httpRequest(req, function(){
        console.log(this.responseText);
        console.log(req);
        $("#alumnos").load(ruta+"alumno/ thead#header,tbody#listaAlumnos");

        alert("El alumno con id_alumno: "+idAlumno+" fue eliminado");
      });
   
  } else {
    alert("Cancelo");
  }
}

function getById(idAlumno) {
  var req=ruta+"alumno/getById/"+idAlumno;
        httpRequest(req, function(){
          console.log(req);
          $("#id01").load(ruta+"alumno/ div#id01");
          setTimeOut(document.getElementById('id01').style.display='block', 10500)
        });
  }

function httpRequest(url,callback){
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();

  http.onreadystatechange= function(){
    if (this.readyState == 4 && this.status == 200) {
        callback.apply(http);
    } 

  }
}


// const botones = document.querySelectorAll('.delete');
//   console.log("HOLA");
// botones.forEach(boton =>{
//   boton.addEventListener("click", function(){
//       console.log("HOLAs");
//       alert("hola");
//   });

// });

 // $.ajax({
    //     url: ruta+'alumno/delete/'+idAlumno,
    //     type: 'POST',
    //     data:datosform+"texto"
    // }).done( function(idAlumno){
    //     alert("El alumno "+ idAlumno+" Fue eliminado");
    // });
    
    
    // 
    // xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //   document.getElementById("txtHint").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("GET", URL+"alumno/delete/"+str, true);
    // xhttp.send();

    // $.ajax({
    //     type: "POST",
    //     data: "id=" + idjuego,
    //     url: "http://localhost/mvc/alumno/delete/"+idjuego,
    //     success: function(r) {
    //       if (r == 1) {
    //         $('#alumnos').load('http://localhost/mvc/alumno');
    //         alert("Se fue");
    //       } else {
    //         alert("Se queda");
    //       }
    //     }
    //   });
