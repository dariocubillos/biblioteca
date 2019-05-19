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
<br>
<div class="col-12">
   <div class="card">
     <div class="card-header">
       Modificar Libro
     </div>
     <div class="card-body">
      <div class="row">
       <div class="input-group col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">ISBN</span>
            </div>
            <input id="ISBN" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" readonly="true">
          </div>
       </div>
     </div>
     <div class="row">
       <div class="input-group col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Titulo</span>
            </div>
            <input id="Titulo" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
       </div>
     </div>
     <div class="row">
       <div class="input-group col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="label10">Autor(s)</span>
            </div>
            <input id="Autor" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
          </div>
       </div>
     </div>
     <div class="row">
           <div class="input-group col-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="label10">Existencia</span>
                </div>
                <input id="Existencia" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
              </div>
           </div>
           <div class="input-group col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="label10">Lugar</span>
                    </div>
                    <input id="Lugar" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
                  </div>
           </div>
     </div>
     <div class="row">
     <div class="input-group col-4">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="label10">Paginas</span>
          </div>
          <input id="Paginas" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
        </div>
     </div>
     <div class="input-group col-4">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="label10">Precio $:</span>
        </div>
        <input id="Precio" type="number" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
      </div>
     </div>
     <div class="input-group col-4">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="label10">Publicacion :</span>
        </div>
        <input id="Publicacion" type="date" class="form-control" placeholder="" aria-label="" aria-describedby="label10" >
      </div>
     </div>
     </div>

<div class="row">
  <div class="col-md-1">
    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete()">Eliminar</button>
  </div>
  <div class="col-md-1">
    <button type="button" class="btn btn-primary" onclick="Update()">Actualizar</button>
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

<script type="text/javascript">

    $(document).ready(function(){

      GetBookData();

  	});


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


  function getitem(selected) {
   var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
   window.location.href ='configbook.php?ISBN='+slecttoconfig;
  }

  function exit() {
    window.location.href ='logout.php';
  }


  function GetBookData() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var book = url.searchParams.get("ISBN");

    var param = {
        "book" : book,
            };

            $.ajax({
                  data:  param, //datos que se envian a traves de ajax
                  url:   'php/getbookdata.php', //archivo que recibe la peticion
                  type:  'post', //método de envio
                  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    var jsondata=JSON.parse(response);
                    $("#ISBN").val(jsondata[0]["ISBN"]);
                    $("#Titulo").val(jsondata[0]["Title"]);
                    $("#Autor").val(jsondata[0]["Authors"]);
                    $("#Existencia").val(jsondata[0]["Quantity"]);
                    $("#Lugar").val(jsondata[0]["Slot"]);
                    $("#Paginas").val(jsondata[0]["Pages"]);
                    $("#Precio").val(jsondata[0]["Price"]);
                    $("#Publicacion").val(jsondata[0]["PubDate"]);
                  }
                });
}

function Update() {

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
                  url:   'php/updatebook.php', //archivo que recibe la peticion
                  type:  'post', //método de envio
                  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if (Number(response) == true) {
                      alert("Libro actualizado.");
                      location.reload();
                    }else {
                      alert("Error en la actualizacion.");
                    }
                  }
                });


}

function Delete() {

  var Isbn = $("#ISBN").val();

  var param = {
    'Isbn' : Isbn
          };

  $.ajax({
        data:  param, //datos que se envian a traves de ajax
        url:   'php/deletebook.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          if (Number(response) == true) {
            alert("Libro borrado.");
            window.location = "admin.php";
          }else {
            alert("Error en el borrado puede que tenga ejemplares sin devover.");
          }
        }
      });


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

</body>
</html>
