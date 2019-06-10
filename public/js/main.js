console.log("Hola");
function elimina($idjuego) {
var r = confirm("¿Desea eliminar este registro? "+ idjuego);
  if (r == true) {
    $.ajax({
        type: "POST",
        data: "id=" + idjuego,
        url: "http://localhost/mvc/alumno/delete/"+idjuego,
        success: function(r) {
          if (r == 1) {
            $('#alumnos').load('http://localhost/mvc/alumno');
            alert("Se fue");
          } else {
            alert("Se queda");
          }
        }
      });
  } else {
    alert("Cancelo");
  }
  }


  