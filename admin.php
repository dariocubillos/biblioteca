<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIBI</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">
  <script src="js/globalvarfun.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">SIBI</a>
      <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addbook">Añadir Libro</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepass">Cambiar Contraseña</a>
        <a class="dropdown-item" href="#" data-target="#" onclick="backbupdb()">Respaldar DB</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" onclick="exit()">Salir</a>
      </div>
    </div>
    </div>
  </nav>

  <!-- Masthead -->
  <?php
  include 'php/mainconn.php';

  $Mysql = new MysqlConn;

  $Mysql->ExecuteQueryx("Update borrowedbooks SET estate='RETRASADO' WHERE TIMESTAMPDIFF(DAY,borrowedbooks.date,NOW()) > 4;");

  if (isset($_COOKIE["usr"]) && isset($_COOKIE["pass"])) {
    // code...

  }else {
    // code...
    setcookie("usr",$_GET['usr'],time()+3600);
    setcookie("pass",$_GET['pass'],time()+3600);

    if ($Mysql->FunctionName($_GET['usr'],$_GET['pass']) == true) {

    }else {
      // code...
      header("Location:index.html");
    }

  }


   ?>


   <div id="accordion">
     <div class="card">
       <div class="card-header" id="headingOne">
         <h5 class="mb-0">
           <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             Libros y configuracion
           </button>
         </h5>
       </div>
       <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
         <div class="card-body">
           <div class="row" style="padding:5%;">
             <div class="col-12">
               <table id="example" class="display" style="width:100%">
               <thead>
                   <tr>
                       <th>ISBN</th>
                       <th>NOMBRE</th>
                       <th>AUTOR</th>
                       <th>EXISTENCIA</th>
                       <th>LUGAR</th>
                       <th>PUBLICACION</th>
                       <th>MODIFICAR</th>
                       <th>DEVOLVER</th>
                   </tr>
               </thead>
               <tfoot>
                   <tr>
                     <th>ISBN</th>
                     <th>NOMBRE</th>
                     <th>AUTOR</th>
                     <th>EXISTENCIA</th>
                     <th>LUGAR</th>
                     <th>PUBLICACION</th>
                     <th>MODIFICAR</th>
                     <th>DEVOLVER</th>
                   </tr>
               </tfoot>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Prestamos
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
    <div class="card-body">
      <div class="row" style="padding:5%;">
        <div class="col-12">
          <table id="tableprestamos" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>ISBN</th>
                  <th>USER</th>
                  <th>FECHA</th>
                  <th>Estado</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>ISBN</th>
                <th>USER</th>
                <th>FECHA</th>
                <th>Estado</th>
              </tr>
          </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
     <div class="card">
       <div class="card-header" id="headingThree">
         <h5 class="mb-0">
           <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
             Usuarios
           </button>
         </h5>
       </div>
       <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
         <div class="card-body">

           <div class="row" style="padding:5%;">
             <div class="col-12">
           <table id="userstable" class="display">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Nombre</th>
                   <th>Apellidos</th>
                   <th>Email</th>
                   <th>Telefono</th>
                   <th>Direccion</th>
                   <th>Contraseña</th>
                   <th>Accion</th>
               </tr>
           </thead>
           <tfoot>
               <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Apellidos</th>
                 <th>Email</th>
                 <th>Telefono</th>
                 <th>Direccion</th>
                 <th>Contraseña</th>
                 <th>Accion</th>
               </tr>
           </tfoot>
           </table>
         </div>
         </div>
         </div>
       </div>
     </div>
   </div>




  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; SIBI 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

  <script type="text/javascript">

    var slecttoconfig;

    $(document).ready(function(){
  	var uri = window.location.toString();
  	if (uri.indexOf("?") > 0) {
  	    var clean_uri = uri.substring(0, uri.indexOf("?"));
  	    window.history.replaceState({}, document.title, clean_uri);
  	}

    ReloadTable();
    ReloadTablePrestamos();
    ReloadTableUsers();


  });


function backbupdb() {

  $.ajax({
        url:   'php/backupdb.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                      if (Number(response) == true) {
                        alert("Respaldo creado en la carpeta respaldos.");
                        location.reload();
                      }
            }
         });

}

function restoredb() {
  $.ajax({
        url:   'php/restoredb.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                      if (Number(response) == true) {
                        alert("Ultimo respaldo recuperado.");
                        location.reload();
                      }else {
                        alert("Ocurrio un error al recuperar el respaldo");
                      }
            }
         });
}

  function pass() {
    if ($("#newpassword").val() == $("#newpassword0").val()) {

      var param = {
          "user" : getCookie("usr"),
          "newpass": $("#newpassword").val()
              };

              $.ajax({
                    data:  param, //datos que se envian a traves de ajax
                    url:   'php/changepass.php', //archivo que recibe la peticion
                    type:  'post', //método de envio
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                  if (Number(response) == true) {
                                    alert("Contraseña actualizada.");
                                    location.reload();
                                  }else {
                                    alert("Error en el cambio de contraseña.");
                                  }
                                }

             });

    }else {
      alert("Las contraseñas no coinciden.");
    }
  }

  function getCookie(name) {
      var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
      return v ? v[2] : null;
  }


  function ReloadTable() {
    $.ajax({
      type : 'POST',
      url  : 'php/getbooks.php',
      dataType: 'json',
      cache: false,
      success :  function(result)
          {
           $('#example').DataTable({
                  language:languageesp,
                  "data": result,
                  columns: [
                    { "data": "ISBN" },
                    { "data": "Title" },
                    { "data": "Authors" },
                    { "data": "Quantity" },
                    { "data": "Slot" },
                    { "data": "PubDate" },
                    {"defaultContent": "<button onclick='getitem(this)'>Modificar</button>"},
                    {"defaultContent": "<button onclick='bookback(this)' data-toggle='modal' data-target='#backmodal'>Devolución</button>"}
                  ],
                });

          }
      });
  }

function ReloadTablePrestamos() {

  $.ajax({
    type : 'POST',
    url  : 'php/getprestamos.php',
    dataType: 'json',
    cache: false,
    success :  function(result)
        {
         $('#tableprestamos').DataTable({
                language:languageesp,
                "data": result,
                columns: [
                  { "data": "fkbook" },
                  { "data": "fkuser" },
                  { "data": "date" },
                  { "data": "estate" }

                ],
              });
        }
    });
}

function ReloadTableUsers() {
  $.ajax({
    type : 'POST',
    url  : 'php/getusers.php',
    dataType: 'json',
    cache: false,
    success :  function(result)
        {
         $('#userstable').DataTable({
                language:languageesp,
                "data": result,
                columns: [
                  { "data": "ID" },
                  { "data": "Name" },
                  { "data": "LastName" },
                  { "data": "Email" },
                  { "data": "Tel" },
                  { "data": "Addres" },
                  { "data": "Pass" },
                  {"defaultContent": "<button onclick='deleteuser(this)'>Eliminar</button>"}
                ],
              });
        }
    });
}

  function getitem(selected) {
   var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
   window.location.href ='configbook.php?ISBN='+slecttoconfig;
  }

  function bookback(selected) {
  slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
    // window.location.href ='bookback.php?ISBN='+slecttoconfig;
  }

function backbook() {
var usrback = $("#CURPBack").val();

if (usrback != "") {

  var param = {
      "user" : usrback,
      "book": slecttoconfig
          };

          $.ajax({
                data:  param, //datos que se envian a traves de ajax
                url:   'php/updateback.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              if (Number(response) == true) {
                                alert("Libro devuelto.");
                                location.reload();
                              }else {
                                alert("Error en la devolución el libro puede no haber sido prestado por ese usuario.");
                              }
                            }

         });


}else {
  alert("CURP vacia.");
}

}

function deleteuser(selected) {
  var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>

  var param = {
      "user" : slecttoconfig,
          };

          $.ajax({
                data:  param, //datos que se envian a traves de ajax
                url:   'php/deleteuser.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              if (Number(response) == true) {
                                alert("Usuario Eliminado.");
                                location.reload();
                              }else {
                                alert("Error al eliminar usuario.");
                              }
                            }

         });

}

  function AddBook() {

    var Isbn = $("#ISBN").val();
    var Titulo = $("#Titulo").val();
    var Autor = $("#Autor").val();
    var Existencia = $("#Existencia").val();
    var Lugar = $("#Lugar").val();
    var Paginas = $("#Paginas").val();
    var Precio = $("#Precio").val();
    var Publicacion = $("#Publicacion").val();

    var param = {
      'Isbn' : Isbn,
      'Titulo' : Titulo,
      'Autor' : Autor,
      'Existencia' : Existencia,
      'Lugar' : Lugar,
      'Paginas' : Paginas,
      'Precio' : Precio,
      'Publicacion' : Publicacion
            };

            $.ajax({
                  data:  param, //datos que se envian a traves de ajax
                  url:   'php/addbook.php', //archivo que recibe la peticion
                  type:  'post', //método de envio
                  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if (Number(response) == true) {
                      alert("Libro Añadido correctamente.");
                      location.reload();
                    }else {
                      alert("Error al añadir.");
                    }
                  }
                });


}


  function exit() {
    window.location.href ='logout.php';   var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>

  }


</script>


<div id="changepass" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">Nueva Contraseña</span>
             </div>
             <input id="newpassword" type="password" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>

        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">Confirar Contraseña</span>
             </div>
             <input id="newpassword0" type="password" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" onclick="pass()">Cambiar</button>
      </div>
    </div>
  </div>
</div>
</div>

<div id="addbook" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelAdd">Añadir libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">ISBN</span>
             </div>
               <input id="ISBN" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>
        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">Titulo</span>
             </div>
               <input id="Titulo" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>
        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">Autores</span>
             </div>
               <input id="Autor" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>
        <div class="input-group col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Cantidad</span>
            </div>
              <input id="Existencia" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
        </div>
        <div class="input-group col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Lugar de Publicacion</span>
            </div>
              <input id="Lugar" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
        </div>

      <div class="row col-12" style="padding-right:0px !important;">
        <div class="input-group col-6" >
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Paginas: </span>
            </div>
              <input id="Paginas" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
        </div>
        <div class="input-group col-6" style="padding-right:0px !important;">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Precio $: </span>
            </div>
              <input id="Precio" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
        </div>
      </div>


                <div class="input-group col-12">
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                               <span class="input-group-text" id="label10">Publicacion</span>
                             </div>
                        <input id="Publicacion" type="date" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
                    </div>
                </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="AddBook()">Añadir</button>
      </div>
    </div>
  </div>
</div>
</div>


<div id="backmodal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Usuario Regresa Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="input-group col-12">
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="label10">CURP DEL ALUMNO</span>
             </div>
             <input id="CURPBack" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
           </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="backbook()">Devolver</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
