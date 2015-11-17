<?php

class Validador
{
    
    public function obtenerParametrosFaltantesPOST($arrayCampos)
    {
        $mensajeRetorno = '';
        $camposRequeridos = array();    
        $numeroIteracion = 0;
        
        for($index = 0; $index < sizeof($arrayCampos); $index++)
        {
            if(!isset($_POST[$arrayCampos[$index]["nombreCampoPOST"]]))
            {
                $camposRequeridos[$numeroIteracion] = $arrayCampos[$index]["nombreCampo"];
                $numeroIteracion++;
            }  
        }
        
        //Determinar si hubieron campos vacíos
        
        if(sizeof($camposRequeridos) > 0 )
        {
            if(sizeof($camposRequeridos) > 1)
            {
                $mensajeRetorno = 'Faltan campos requeridos: ';
            }
            else
            {
                $mensajeRetorno = 'Falta un campo requerido: ';
            }
        }
        
        $numeroIteracion = 0;
        foreach ($camposRequeridos as $campo) 
        {
            if($numeroIteracion == sizeof($camposRequeridos) - 1)
            {
                $mensajeRetorno .= $campo;
            }
            else
            {
                $mensajeRetorno .= $campo . ', ';
            }
            
            $numeroIteracion++;
            
        }    
        
        $jsonRetorno = array();
        
        if(sizeof($camposRequeridos) > 0 )
        {
            $jsonRetorno = array
            (
                "error" => utf8_encode($mensajeRetorno)
            );            
        }
        else
        {
            $jsonRetorno = array
            (
                "error" => NULL
            );              
        }
        
        return json_encode($jsonRetorno);        
    }
    
    /*
     * Recibe un arreglo como parametro
     * Cada elemento del arreglo es un arreglo, que contiene los atributos
     * "NOMBRE CAMPO " y "VALOR CAMPO"
     * La función determina si hay algun elemento con valor campo vacio.
     */
    public function obtenerCamposVacios($arrayCampos)
    {
        $mensajeRetorno = '';
        $camposRequeridos = array();    
        $numeroIteracion = 0;
        
        for($index = 0; $index < sizeof($arrayCampos); $index++)
        {
            if(empty($arrayCampos[$index]["valorCampo"]))
            {
                $camposRequeridos[$numeroIteracion] = $arrayCampos[$index]["nombreCampo"];
                $numeroIteracion++;
            }  
        }
        
        //Determinar si hubieron campos vacíos
        
        if(sizeof($camposRequeridos) > 0 )
        {
            if(sizeof($camposRequeridos) > 1)
            {
                $mensajeRetorno = 'Faltan campos requeridos: ';
            }
            else
            {
                $mensajeRetorno = 'Falta un campo requerido: ';
            }
        }
        
        $numeroIteracion = 0;
        foreach ($camposRequeridos as $campo) 
        {
            if($numeroIteracion == sizeof($camposRequeridos) - 1)
            {
                $mensajeRetorno .= $campo;
            }
            else
            {
                $mensajeRetorno .= $campo . ', ';
            }
            
            $numeroIteracion++;
            
        }    
        
        $jsonRetorno = array();
        
        if(sizeof($camposRequeridos) > 0 )
        {
            $jsonRetorno = array
            (
                "error" => utf8_encode($mensajeRetorno)
            );            
        }
        else
        {
            $jsonRetorno = array
            (
                "error" => NULL
            );              
        }
        
        return json_encode($jsonRetorno);
    }
    
    public function esNumero($var)
    {
        return filter_var($var, FILTER_VALIDATE_INT) == 0 ? 0 : 1;
    }
      
    public function emailEsValido($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
}