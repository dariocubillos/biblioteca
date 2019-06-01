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
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepass">Cambiar Contraseña</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Credencial">Imprimir Credencial</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ListApart">Ver Apartados</a>
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


if (isset($_COOKIE["usr"]) && isset($_COOKIE["pass"])) {
  // code...

}else {
  // code...
  setcookie("usr",$_GET['usr'],time()+3600);
  setcookie("pass",$_GET['pass'],time()+3600);


  if ($Mysql->FunctionName($_GET['usr'],$_GET['pass']) == true) {
    if ($_GET['usr'] == "ADMIN") {
      // code...
      header("Location:admin.php");
    }
  }else {
    // code...
    header("Location:index.html");
  }

}
 ?>


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
             <th>ACCION</th>
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
           <th>ACCION</th>
         </tr>
     </tfoot>
     </table>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="js/globalvarfun.js"></script>
  <script src="node_modules/html2canvas/dist/html2canvas.js"></script>



  <script type="text/javascript">

    var table;

    $(document).ready(function(){

      var uri = window.location.toString();
    	if (uri.indexOf("?") > 0) {
    	    var clean_uri = uri.substring(0, uri.indexOf("?"));
    	    window.history.replaceState({}, document.title, clean_uri);
    	}

        ReloadTable();
        ReloadTableApart();
        GeUserData();


    });

function GeUserData() {

  var usr = getCookie("usr");

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

function ReloadTableApart() {

  var param = {
      "user" : getCookie("usr"),
          };

  $.ajax({
    data:  param,
    type : 'POST',
    url  : 'php/getbooksapart.php',
    dataType: 'json',
    cache: false,
    success :  function(result)
        {
         $('#apartbooks').DataTable({
                language:languageesp,
                "data": result,
                columns: [
                  { "data": "fkbook" },
                  { "data": "date" },
                  { "data": "estate" }
                ],
              });

        }
    });
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
                  {"defaultContent": "<button onclick='getitem(this)'>Apartar</button>"}
                ],
              });

        }
    });
}


  function exit() {
    window.location.href ='logout.php';
  }

function getitem(selected) {
 var slecttoapart = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
 var numexist = selected.parentNode.parentElement.children[3].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>

if (Number(numexist) > 0) {

  var param = {
      "ISBN" : slecttoapart,
      "usr" :getCookie("usr")
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
                                              if (Number(response) == true) {
                                                alert("Apartado correcto.");
                                                location.reload();
                                              }else {
                                                alert("Error en el apartado.");
                                              }
                                            }

                         });

                      }else {
                        alert("Ya has apartado un ejemplar de este libro.");
                      }
                    }

 });



}else {
  alert("No hay libros disponibles de este ejemplar espera a que regrese uno.");
}

}

function getCookie(name) {
    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return v ? v[2] : null;
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

function SaveCred() {
  html2canvas(document.querySelector("#areaprint")).then(canvas => {
      saveAs(canvas.toDataURL(), 'Credencial.png');
    });
}


function saveAs(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = uri;
      link.download = filename;

      //Firefox requires the link to be in the body
      document.body.appendChild(link);

      //simulate click
      link.click();

      //remove the link when done
      document.body.removeChild(link);
    } else {
      window.open(uri);
    }
  }



</script>

<div id="ListApart" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="LabelApartados">Apartados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row" style="padding:5%;">
          <div class="col-12">
            <table id="apartbooks" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>FECHA</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>ISBN</th>
                  <th>FECHA</th>
                  <th>ESTADO</th>
                </tr>
            </tfoot>
            </table>
          </div>
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


<div id="Credencial" class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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



</body>
</html>
