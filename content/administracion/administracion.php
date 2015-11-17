<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="UTF-8";>
  <link rel="stylesheet" href="css/estiloAdministracion.css" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="lib/DataTables/media/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="lib/DataTables/media/css/smoothness-jquery-ui.css">

</head>
<body>
	<div class="container-fluid">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3 col-md-3">
        <ul class="list-unstyled">
          <br>
          <li class="nav-header"> 
              <h4 class="manito" id="gestionPlaya">
                <i class="fa fa-anchor"></i> Gestión de playas
              </h4>
          </li>
          <hr/>
          <br>
          <li class="nav-header"> 
              <h4 class="manito" id="gestionRestaurante">
                <i class="fa fa-cutlery"></i> Gestión de Restaurante
              </h4>
          </li>
          <hr/>
          <br>
          <li class="nav-header">             
              <h4 class="manito" id="gestionMundoColonial">
                <i class="fa fa-globe"></i> Gestión de Mundo Colonial
              </h4>
          </li>
          <hr/>
          <br>
          <li class="nav-header">             
              <h4 class="manito" id="gestionLugarReposo">
                <i class="fa fa-building"></i> Gestión Lugares de Reposo
              </h4>
          </li>
        </ul>
      </div>            
      <div class="col-xs-9 col-sm-9 col-md-9 col-md-9">
        <div id="contenedorGestion" class="content-panel">
          
        </div>
      </div> 
            
    </div>
  </div>
  <script type="text/javascript" charset="utf8" src="lib/DataTables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="lib/DataTables/media/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript">
      
      $("#gestionPlaya").click(function(){

        $("#contenedorGestion").load("content/administracion/gestionPlaya/gestionPlaya.php")
      })

      $("#gestionRestaurante").click(function(){

        $("#contenedorGestion").load("content/administracion/gestionRestaurante/gestionRestaurante.php")
      })
      $("#gestionMundoColonial").click(function(){

        $("#contenedorGestion").load("content/administracion/gestionMundoColonial/gestionMundoColonial.php")
      })
      $("#gestionLugarReposo").click(function(){

        $("#contenedorGestion").load("content/administracion/gestionLugarReposo/gestionLugarReposo.php")
      })
  </script>
</body>
</html>