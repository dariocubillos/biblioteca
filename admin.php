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
  <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">
  <script src="js/globalvarfun.js"></script>

</head>

<body>

<style media="screen">

.btn-block {
    padding: 3em 0;
}
.mainmenubutton{
  padding: 1.3%;
}

.modal-ku {
  width: 1750px;
  margin: auto;
}

</style>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">SIBI</a>
      <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepass">Cambiar Contraseña</a>
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
<!--
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
-->
<br>
<div class="mainmenubutton">
<div class="row">
  <div class="col-md-4 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" href="#" data-toggle="modal" data-target="#addbook" >Añadir Libros <i class="fa fa-book" aria-hidden="true"></i></button>
  </div>
  <div class="col-md-4 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#prestamoslibrosmodal">Prestamos y Libros <i class="fa fa-check" aria-hidden="true"></i></button>
  </div>
  <div class="col-md-4 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#alumnosmodal">Usuarios <i class="fa fa-users" aria-hidden="true"></i></button>
  </div>
</div>
<br>
<div class="row">
<!-- <div class="col-md-4 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#PrestamoDirectoModal">Prestar a Usuario <i class="fa fa-address-book" aria-hidden="true"></i></button>
  </div> -->
  <div class="col-md-6 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="backbupdb()">Respaldar DB <i class="fa fa-database" aria-hidden="true"></i></button>
  </div>
  <div class="col-md-6 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#pendientesmodal">Prestamos Pendientes  <i class="fa fa-eye" aria-hidden="true"></i></button>
  </div>
</div>
</div>

<br>

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
  <script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>
  <script src="node_modules/html2canvas/dist/html2canvas.js"></script>

  <script type="text/javascript">

    var slecttoconfig;
    var d = new Date();
    var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
    var selectbookdirpress;

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


  function getuserdata(selected) {

    var usr = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>;

    var param = {
        "user" : usr,
            };

            $.ajax({
              data:  param,
              type : 'POST',
              url  : 'php/getuserdata.php',
              dataType: 'json',
              cache: false,
              success :  function(result)
                  {
                  $("#Nombre").val(result[0]["Name"]);
                  $("#Apellidos").val(result[0]["LastName"]);
                  $("#Email").val(result[0]["Email"]);
                  $("#Tel").val(result[0]["Tel"]);
                  $("#Direccion").val(result[0]["Addres"]);
                  }
              });

  }



  function SaveCred() {
    html2canvas(document.querySelector("#areaprint")).then(canvas => {
        saveAs(canvas.toDataURL(), 'Credencial.png');
      });
  }


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
             dom: 'Bfrtip',
         buttons: [
             {
                 extend: 'pdfHtml5',
                 exportOptions: {
                  columns: [ 0, 1, 2, 3 ]
              },
                 messageTop: 'Reporte libros en existencia a la fecha : '+strDate
             }
         ],
                   fixedHeader: true,
                  language:languageesp,
                  "data": result,
                  columns: [
                    { "data": "ISBN" },
                    { "data": "Title" },
                    { "data": "Authors" },
                    { "data": "Quantity" },
                    {"defaultContent": "<button onclick='getitem(this)'>Modificar</button>"},
                    {"defaultContent": "<button onclick='bookback(this)' data-toggle='modal' data-target='#backmodal'>Devolución</button>"},
                    {"defaultContent": "<button onclick='bookpres(this)' data-toggle='modal' data-target='#PrestamoDirectoModal'>Prestar</button>"}
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
           dom: 'Bfrtip',
       buttons: [
           {
               extend: 'pdfHtml5',
               messageTop: 'Reporte de prestamos a la fecha: '+strDate
           }
       ],
                language:languageesp,
                "data": result,
                columns: [
                  { "data": "Nombre" },
                  { "data": "Apellidos" },
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
           dom: 'Bfrtip',
       buttons: [
           {
               extend: 'pdfHtml5',
               messageTop: 'Reporte de usuarios a la fecha : '+strDate
           }
       ], fixedHeader: true,
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
                  {"defaultContent": "<button onclick='deleteuser(this)'>Eliminar</button>"},
                  {"defaultContent": "<button onclick='getuserdata(this)' data-toggle='modal' data-target='#Credencial'>Credencial</button>"}
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


    function bookpres(selected) {
    selectbookdirpress = selected.parentNode.parentElement.children[0].textContent;
    selectnumberbook = selected.parentNode.parentElement.children[3].textContent;
      $("#ISBNdir").val(selectbookdirpress);
    }

function PrestarLibro() {

if ($("#ISBNdir").val() != "" && $("#CURPUserdir").val() != "") {

  if (Number(selectnumberbook) > 0) {

    var param = {
        "ISBN" : $("#ISBNdir").val(),
        "usr" :$("#CURPUserdir").val()
            };

    $.ajax({
          data:  param, //datos que se envian a traves de ajax
          url:   'php/uniquecheck.php', //archivo que recibe la peticion
          type:  'post', //método de envio
          success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        if (Number(response) == false) {
                            $.ajax({
                                  data:  param, //datos que se envian a traves de ajax
                                  url:   'php/apart.php', //archivo que recibe la peticion
                                  type:  'post', //método de envio
                                  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                                  alert("Apartado correcto.");
                                                  if (Number(response) == true) {
                                                  location.reload();
                                                }else if (Number(response) == 3) {
                                                  alert("Se ha excedido el limite de 3 libros.");
                                                }else {
                                                  alert("Error en el apartado.");
                                                }
                                              }

                           });

                        }else {
                          alert("Ya has apartado un ejemplar de este libro para el usuario.");
                        }
                      }
   });
  }else {
    alert("No hay libros disponibles de este ejemplar espera a que regrese uno.");
  }
}else {
  alert("Rellene los campos en el formulario.");
}

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
                    }else if (Number(response) == 3) {
                      alert("ISBN duplicado.");
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

<!--
<div id="prestamoslibrosmodal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Prestamo de Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
-->

 <div id="PrestamoDirectoModal"class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:10000000000000">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Prestar a alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">ISBN Libro</span>
                 </div>
                 <input id="ISBNdir" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">CURP del usuario</span>
                 </div>
                 <input id="CURPUserdir" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" >
               </div>
           </div>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="PrestarLibro()">Aceptrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<div id="pendientesmodal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Libros Pendientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table id="tableprestamos" class="display" style="width:100%">
          <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                  <th>ISBN</th>
                  <th>USER</th>
                  <th>FECHA</th>
                  <th>Estado</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>ISBN</th>
                <th>USER</th>
                <th>FECHA</th>
                <th>Estado</th>
              </tr>
          </tfoot>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>


<div id="Credencial" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:10000000000000">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Credencial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="areaprint">
        <div class="row">
            <div class="col-md-10" style="padding-left:9em;">
                <div style="text-align: center;">
                    <h3>Nombre de la escuela</h3>
                    <h5>Credencial de biblioteca</h5>
                </div>
            </div>
            <div class="col-md-2">
              <img src="img\escudoescuela.png" height="100" width="100" crossorigin>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">Nombre</span>
                 </div>
                 <input id="Nombre" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">Apellidos</span>
                 </div>
                 <input id="Apellidos" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">E-mail</span>
                 </div>
                 <input id="Email" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
          <div class="col-md-6">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">Telefono</span>
                 </div>
                 <input id="Tel" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <span class="input-group-text" id="label9">Direccion</span>
                 </div>
                 <input id="Direccion" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label9" readonly="true">
               </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="input-group col-12">
            <input id="Firma" type="text" class="form-control" placeholder="Firma del Bibliotecario" aria-label="" aria-describedby="label9" readonly="true" style="text-align:center;">
          </div>
          </div>
        </div>
      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary  " onclick="SaveCred()">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>



<div id="alumnosmodal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 1166px !important;">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">

        <table id="userstable" class="table table-striped table-bordered" style="width:20%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Contraseña</th>
                <th>Borrar</th>
                <th>Credencial</th>
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
              <th>Borrar</th>
              <th>Credencial</th>
            </tr>
        </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>



<div id="prestamoslibrosmodal" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Prestamo de Libros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:20%;">
  <thead>
      <tr>
          <th>ISBN</th>
          <th>NOMBRE</th>
          <th>AUTOR</th>
          <th>EXISTENCIA</th>
          <th>MODIFICAR</th>
          <th>DEVOLVER</th>
          <th>PRESTAR</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th>ISBN</th>
        <th>NOMBRE</th>
        <th>AUTOR</th>
        <th>EXISTENCIA</th>
        <th>MODIFICAR</th>
        <th>DEVOLVER</th>
        <th>PRESTAR</th>
      </tr>
  </tfoot>
  </table>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>



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
