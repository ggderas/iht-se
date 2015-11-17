<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author LuisManuel
 * Gestiona las conexiones, consultas, llamados a
 * funciones, procedimientos almacenados, vistas, etc.
 * 
 * Ejemplo funcional:
 * 
 * 
 *      //Creating the connection instance
        $connection = new Connection();
        
        //Setting the query and preparing the statement
        $query = "CALL STORED_PROCEDURE_PRUEBA(:param1, :param2, @outParameter, @outParameter2)";
        $connection->prepareStatement($query);
        
        //Creating the parameters array
        $parametros = array
        (
            "param1" => 'Luis',
            "parmam2" => 21
        );
        
        //Executing the statement
        $connection->executeStatement($parametros);
        
        //Getting and free-ing the result
        $result = $connection->getResult();
        $connection->freeResult();
        
        //Getting the out parameters
        
        $outParameters = array("@outParameter", "@outParameter2");
        $outParameters = $connection->getParametrosOUT($outParameters);
 * 
 */
require_once("config/Config.php");

class Connection extends Config
{
    private $link;
    private $statement;
    private $result;
    
    function __construct()
    {
        $this->link = new PDO(parent::getDNS(), $this->username, $this->password);
    }
    
    /*
     * Genera una prepared statement en base a un 
     * query de la variable $statement. 
     */
    public function prepareStatement($statement)
    {
        $this->statement = $this->link->prepare($statement);
    }   
    
    /*
     * Ejecuta el prepared statement generado anteriormente
     * con la funcion preparedStatement($statement)
     * 
     * Recibe los parametros a manera de arreglo de la siguiente manera
     * array 
     *  (
     *    "nombreParametro1" : valorParametro1,
     *    "nombreParametro2" : valorParametro2
     *  )
     */
    public function executeStatement($parametros)
    {
       $this->statement->execute($parametros);
    }
    
    /*
     * Obtiene el resultado o resultSet a partir del 
     * statement generado en la funcion executeStatement($parametros)
     */
    public function getResult()
    {
        return $this->statement->fetchAll();
    }
    
    public function freeResult()
    {
        $this->statement->closeCursor();
    }
    
    public function getParametrosOUT($parametros)
    {
        $parametroString = implode(',', $parametros);
        return $this->link->query("SELECT " . $parametroString)->fetch(PDO::FETCH_ASSOC);
    }
    
    public function commit()
    {
        $this->link->commit();
    }
    
    public function rollback()
    {
        $this->link->rollBack();
    }
    
    public function beginTransaction()
    {
        $this->link->beginTransaction();
    }
    
}
