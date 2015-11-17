<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<form role="form" class="form-horizontal" >
		<div class="container">
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<div class="panel panel-success panel-lg">
					  <div class="panel-heading">
					    <h4><center>Gestion de Playas</center></h4>
					</div>

					<div class="panel-body">

					    <?php
					    	require_once("nuevaPlaya.php");
					    ?>
					    <br/><br/>
					  	<div class="content-panel">
					  		<div class="table-responsive">

							  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							  	<thead>
						            <tr>
						                <th>Nombre</th>
						                <th>Descripción</th>
						                <th>Imagen</th>                
						                <th>Telefono</th>
						                <th>Correo</th>
						                <th>Editar</th>
						                <th>Eliminar</th>
						            </tr>
						        </thead>
						        <tfoot>
						            <tr>
						                <th>Nombre</th>
						                <th>Descripción</th>
						                <th>Imagen</th>                
						                <th>Telefono</th>
						                <th>Correo</th>
						                <th>Editar</th>
						                <th>Eliminar</th>
						            </tr>
						        </tfoot>
								<tbody id="tbody">
									<tr>
						                <td>Bruno Nash</td>
						                <td>Software Engineer</td>
						                <td>London</td>
						                <td>38</td>
						                <td>2011/05/03</td>						        
						                <td>
								            <center>
								              <button type="button"  id="editar" href="#" class="editar btn btn-primary glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editarModal" data-whatever="@mdo"></button>
								            </center>
								          </td>
								          <td>
								            <center>
								              <button type="button"  id="eliminar" href="#" class="elimina btn btn-danger glyphicon glyphicon-trash"></button>
								            </center>
								          </td>                
						            </tr>
						            <tr>
						                <td>Sakura Yamamoto</td>
						                <td>Support Engineer</td>
						                <td>Tokyo</td>
						                <td>37</td>
						                <td>2009/08/19</td>						                
						                <td>
								            <center>
								              <button type="button"  id="editar" href="#" class="editar btn btn-primary glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editarModal" data-whatever="@mdo"></button>
								            </center>
								          </td>
								          <td>
								            <center>
								              <button type="button"  id="eliminar" href="#" class="elimina btn btn-danger glyphicon glyphicon-trash"></button>
								            </center>
								          </td>
						            </tr>
						            <tr>
						                <td>Thor Walton</td>
						                <td>Developer</td>
						                <td>New York</td>
						                <td>61</td>
						                <td>2013/08/11</td>						               
						                <td>
								            <center>
								              <button type="button"  id="editar" href="#" class="editar btn btn-primary glyphicon glyphicon-edit"  data-toggle="modal" data-target="#editarModal" data-whatever="@mdo"></button>
								            </center>
								          </td>
								          <td>
								            <center>
								              <button type="button"  id="eliminar" href="#" class="elimina btn btn-danger glyphicon glyphicon-trash"></button>
								            </center>
								          </td>
						            </tr>  
								  </tbody>
								</table>
							</div>
					  	</div>
					    
					</div>
					</div>
				</div>
			</div>
		</div>		
    </form>

	
	<script type="text/javascript">
        $(function()
        {
            $('#example').DataTable();
            
            function ingresarPlaya()
            {
                var parametros =
                        {
                            nombrePlaya: $("#nombrePlaya").val(),
                            descripcionPlaya: $("#descripcionPlaya").html(),
                            telefono1Playa: $("#telefono1Playa").val(),
                            telefono2Playa: $("#telefono2Playa").val(),
                            telefono3Playa: $("#telefono3Playa").val(),
                            correo1Playa: $("#correo1Playa").val(),
                            correo2Playa: $("#correo2Playa").val(),
                            cmbMunicipios: $("#cmbMunicipios").val()
                        };

                console.log(parametros);


                        $.ajax
                        ({
                            type: "POST",
                            url: directorioRoot + "ajax/ajax_ply.php",
                            data: parametros,
                            success: function (response)
                            {
                                var result = JSON.parse(response);

                                if (result.error === null)
                                {
                                    alert('Ingreso la playa con exito');
                                }
                                else
                                {
                                    alert(result.error);
                                }
                            }
                        });
            }            
        })		
	</script>

</body>
</html>