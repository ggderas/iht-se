<?php

if(!isset($_SESSION))
{
    session_start();
}

require_once("util.php");
require_once($rootAddressPHP."class/Validador.php");
require_once($rootAddressPHP."database/Connection.php");

if(isset($_POST["accion"]))
{
    $accion = $_POST["accion"];
    
    switch($accion)
    {
        /*
         * Objetivo: Ingresar un nuevo registro de playa
         */
        case 1: 
        {
                $validador = new Validador();
                
                /*------------------- VALIDACION DE CAMPOS FALTANTES ------------------------ */
                /*----------------------------------------------------------------------- */                
                $arrayCampos = array
                (
                    array
                        (
                        "nombreCampo" => "Nombre de playa",
                        "nombreCampoPOST" => "nombrePlaya"
                    ),
                    array
                        (
                        "nombreCampo" => "Descripción de playa",
                        "nombreCampoPOST" => "descripcionPlaya"
                    ),                    
                    array
                        (
                        "nombreCampo" => "Teléfono 1",
                        "nombreCampoPOST" => "telefono1Playa"
                    ),
                    array
                        (
                        "nombreCampo" => "Teléfono 2",
                        "nombreCampoPOST" => "telefono2Playa"
                    ),
                    array
                        (
                        "nombreCampo" => "Teléfono 3",
                        "nombreCampoPOST" => "telefono3Playa"
                    ),
                    array
                        (
                        "nombreCampo" => "Correo electrónico #1",
                        "nombreCampoPOST" => "correo1Playa"
                    ),
                    array
                        (
                        "nombreCampo" => "Correo electrónico #2",
                        "nombreCampoPOST" => "correo2Playa"
                    ),
                    array
                        (
                        "nombreCampo" => "Municipio",
                        "nombreCampoPOST" => "cmbMunicipios"
                    )                      
                    
                    
                );
                
                $validadorResponse = json_decode($validador->obtenerParametrosFaltantes($arrayCampos));

                if ($validadorResponse->error != NULL)
                {
                    $jsonRetorno = array
                    (
                        "error" => utf8_decode($validadorResponse->error)
                    );

                    echo json_encode($jsonRetorno);
                    break;
                }                   
            
                // Informacion de playa
                $nombrePlaya = $_POST["nombrePlaya"];
                $descripcionPlaya = $_POST["descripcionPlaya"];
                
                $telefono1 = $_POST["telefono1Playa"];
                $telefono2 = $_POST["telefono2Playa"];
                $telefono3 = $_POST["telefono3Playa"];
                $correo1 = $_POST["correo1Playa"];
                $correo2 = $_POST["correo2Playa"];
                
                $codigoMunicipio = $_POST["cmbMunicipios"];
                
                /*------------------- VALIDACION DE CAMPOS VACIO ------------------------ */
                /*----------------------------------------------------------------------- */
                
                $arrayCampos = array
                    (
                    array
                        (
                        "nombreCampo" => "Nombre de playa",
                        "valorCampo" => $nombrePlaya
                    ),
                    array
                        (
                        "nombreCampo" => "Descripción",
                        "valorCampo" => $descripcionPlaya
                    ),
                    array
                        (
                        "nombreCampo" => "Teléfono #1",
                        "valorCampo" => $telefono1
                    ),
                    array
                        (
                        "nombreCampo" => "Teléfono #2",
                        "valorCampo" => $telefono2
                    ),                    
                    array
                        (
                        "nombreCampo" => "Teléfono #3",
                        "valorCampo" => $telefono3
                    ),                    
                    array
                        (
                        "nombreCampo" => "Correo #1",
                        "valorCampo" => $correo1
                    ),                    
                    array
                        (
                        "nombreCampo" => "Correo #2",
                        "valorCampo" => $correo2
                    ),                    
                    array
                        (
                        "nombreCampo" => "Municipio",
                        "valorCampo" => $codigoMunicipio
                    )
                ); 
                
                $validadorResponse = json_decode($validador->obtenerCamposVacios($arrayCampos));

                
                //Determinar si existen parametros con valores vacíos.
                if ($validadorResponse->error != NULL) 
                {
                    $jsonRetorno = array
                    (
                        "error" => utf8_decode($validadorResponse->error)
                    );

                    echo json_encode($jsonRetorno);
                    break;
                }
                
                /*-------- VALIDACION DE ESPACIOS EN BLANCO----------- */
                /*----------------------------------------------------- */
                $nombrePlaya = trim($nombrePlaya);
                $descripcionPlaya = trim($descripcionPlaya);
                $telefono1 = trim($telefono1);
                $telefono2 = trim($telefono2);
                $telefono3 = trim($telefono3);
                $correo1 = trim($correo1);
                $correo2 = trim($correo2);
                $codigoMunicipio = trim($codigoMunicipio);
                
                /*-------- VALIDACION DE ADDSLASHES PARA CARACTERES ' y " ----------- */
                /*------------------------------------------------------------------- */  
                
                $nombrePlaya = addslashes($nombrePlaya);
                $descripcionPlaya = addslashes($descripcionPlaya);
                $telefono1 = addslashes($telefono1);
                $telefono2 = addslashes($telefono2);
                $telefono3 = addslashes($telefono3);
                $correo1 = addslashes($correo1);
                $correo2 = addslashes($correo2);
                $codigoMunicipio = addslashes($codigoMunicipio);
                
                /*-------- VALIDACION DE CAMPOS QUE DEBEN DE SER NÚMEROS ------------ */
                /*------------------------------------------------------------------- */   
                
                if(!$validador->esNumero($codigoMunicipio))
                {
                    echo json_encode(array("error" => ('El municipio seleccionado no es correcto')));
                    break;
                }      
                
                /* ------------------------------ INGRESO DE PLAYA ---------------------------------- */
                /* --------------------------------------------------------------------------------- */
                
                $connection = new Connection();
                
                $query = 'CALL SP_PLAYA_INGRESAR(:pcNombre, :pcDescripcion, :pcTelefono1, :pcTelefono2, :pcTelefono3,'
                        . ' :pcCorreo1, :pcCorreo2, :pnCodigoMunicipio, :pnCodigoCiudad, :pcPosocionamiento, @pnCodigoPlaya,'
                        . ' @pcMensajeError)';
                
                $connection->prepareStatement($query);
                
                $parametros = array 
                (
                    "pcNombre" => $nombrePlaya,
                    "pcDescripcion" => $descripcionPlaya,
                    "pcTelefono1" => $telefono1,
                    "pcTelefono2" => $telefono2,
                    "pcTelefono3" => $telefono3,
                    "pcCorreo1" => $correo1,
                    "pcCorreo2" => $correo2,
                    "pnCodigoMunicipio" => $codigoMunicipio,
                    "pnCodigoCiudad" => $codigoCiudad,
                    "pcPosocionamiento" => $posicionamiento
                );
                
                //Iniciar la transaccion
                $connection->beginTransaction();
                
                $connection->executeStatement($parametros);
                $result = $connection->getResult();
                
                //Liberar el resultset
                $connection->freeResult();
                
                //Arreglo con los parametros de salida del procedimiento almacenado
                $parametrosDeSalida = array("@pnCodigoPlaya", "@pcMensajeError");
                
                $outParameters = $connection->getParametrosOUT($parametros);
                
                $mensajeError = $outParameters["@pcMensajeError"];
                $codigoPlaya = $outParameters["@pnCodigoPlaya"];
                
                //Determinar si hubo algun error en la transaccion
                if($mensajeError == NULL)
                {
                    //No hubo error en la transaccion.
                    echo json_encode(array("error" => NULL));
                }
                else
                {
                    //Realizar un volcado de las transacciones anteriores
                    $connection->rollback();
                    echo json_encode(array("error" => $mensajeError));
                }
                
                break;
        }
    }
}
