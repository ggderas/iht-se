<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author LuisManuel
 * Gestiona unicamente las credenciales de la conexion.
 * No tiene ninguna acción sobre la base de datos más que
 * servir las credenciales a la conexión
 */
class Config
{
    protected $username = 'root';
    protected $password = '';
    protected $hostName = 'localhost';
    protected $databaseName = 'prueba';   
    
    
    protected function getDNS()
    {
        return "mysql:host=" . $this->hostName . ";dbname=" . $this->databaseName;
    }
}
