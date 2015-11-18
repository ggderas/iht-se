<!DOCTYPE html>
<html>
<head>
  
    <style>
      .modal-header, .close{
          background-color: #5cb85c;
          color:white !important;
          text-align: center;
          font-size: 30px;
      }
      .modal-footer {
          background-color: #EDF5F0;
      }

      .cajaFile
        {
            width: 800px;
            padding:20px;
            
        }       
        .lis
        {
            background-color: #A7F7B0;
            width: 800px;
            height: 200px;
            padding-bottom: 37px;
            border:2px dotted #3BEFED;
            overflow: scroll;


        }
        .lis li
        {
            width: 128px;
            height: 128px;
            background: #f5f5f5 url("images/cam.png");
            border: 2px dashed #8A8E8D;
            display: inline-block;
            cursor: pointer;
            vertical-align: middle;
            position: relative;
            margin-left: 6px;
            margin-top: 10px;
            margin-bottom: 25px;        
        }
        .link
        {
            display: block;
            width: 128px;
            height: 128px;
            vertical-align: middle;
            
        }
     </style>
</head>

<body>
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#pantallaModal">
            <span class="glyphicon glyphicon-screenshot"></span> Nueva playa
        </button>
        <div id="pantallaModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Registrar Nueva Playa</h2>
                    </div>
                                
                    <div class="modal-body">
                              
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Nombre playa</label>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" id="nombrePlaya" placeholder="Nombre de la playa">  
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Descripción</label>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <textarea class="form-control" id="descripcionPlaya" placeholder="Descripción" rows="5"></textarea>     
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Telefonos</label>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-earphone"></span></span>   
                                        <input type="tel" id="telefono1Playa" class="form-control" placeholder="telefono#1">
                                    </div>                              
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-earphone"></span></span>   
                                        <input type="tel" id="telefono2Playa" class="form-control" placeholder="telefono#1">
                                    </div>                              
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-earphone"></span></span>   
                                        <input type="tel" id="telefono3Playa" class="form-control" placeholder="telefono#1">
                                    </div>                              
                                </div>    
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Correos</label>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" id="correo1Playa" class="form-control" placeholder="Correo#1">
                                    </div>                          
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" id="correo2Playa" class="form-control" placeholder="Correo#2">
                                    </div>                          
                                </div>     
                            </div>

                            <div class="form-group" hidden>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Ubicación</label>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <select class="form-control">
                                      <option selected="true">Elija un Departamento</option>
                                      <option>1</option>                              
                                    </select>
                                </div>    
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <select class="form-control">
                                      <option selected="true">Elija un Municipio</option>
                                      <option>1</option>                              
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Ubicación</label>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="opciones" id="ciudad">Ciudad
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="opciones" id="municipio">Municipio
                                    </label>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group" hidden="true" id="menu">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" ></label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <select id="opcionesUbicacion"  class="form-control"></select>
                                </div>    
                            </div>  
                            
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" >Coordenadas Google Map</label>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" id="nombrePlaya" placeholder="Nombre de la playa">  
                                </div>    
                            </div>
                            <div class="form-group">                                                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="cajaFile" >         
                                        <button type="button " class="btn btn-success Agregar">
                                            <span class="glyphicon glyphicon-plus"></span> Agregar Imagen
                                        </button>
                                        <br/><br/>
                                        <ul class="lis"></ul>   
                                    </div>
                                </div>    
                            </div>
                                                            
                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Cancelar</button>                      
                    </div>
                </div>  
            </div>          
        </div>      

        <script type="text/javascript">
            var wrapper= $("<div id=show/>").css({height:0,height:0, 'overflow':'hidden'});

            $("#municipio").change(function(){
                
                var option="<option selected>Elina un Municipio</option>";
                $("#opcionesUbicacion").html(option);
                $("#menu").attr('hidden',false);                            
            })

            $("#ciudad").change(function(){
                var option="<option selected>Elina una Ciudad</option>";
                $("#opcionesUbicacion").html(option);
                $("#menu").attr('hidden',false);                            
            })

            //Este es el codigo para cargar las imagenes
            

            $("button.Agregar").click(function(){
                agregarInput();
            });

            function agregarInput()
            {       
                
                var file='<input type="file" id="file" class="a" name="file[]">';
                var div='<div id="photo" class="link"></div>';
                var li='<li>'+file+div+'</div>';
                var boton='<button type="button" class="btn btn-danger btn-sm" id="eliminar" ><span class="glyphicon glyphicon-remove"></span></button>';

                $("ul.lis").append(li+boton);
                $("input#file").wrap(wrapper);

                alert("hola");
            }

            $(document).on("click","#eliminar",function(){
                    var button = $(this)            
                    var classInput= button.parent();
                    $(classInput).remove();                 
            });

            $(document).on("click","#photo",function(){
                $("#file").click();
            }).show();
            
        </script>
</body>
</html>
