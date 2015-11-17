-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: iht
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'iht'
--
/*!50003 DROP PROCEDURE IF EXISTS `SP_PLAYA_INGRESAR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_PLAYA_INGRESAR`(
	IN pcNombre VARCHAR(500),
    IN pcDescripcion VARCHAR(5000),
    IN pcTelefono1 VARCHAR(100),
    IN pcTelefono2 VARCHAR(100),
    IN pcTelefono3 VARCHAR(100),
    IN pcCorreo1 VARCHAR(500),
    IN pcCorreo2 VARCHAR(500),
    IN pnCodigoMunicipio INT, 
    IN pnCodigoCiudad INT,
    IN pcPosocionamiento VARCHAR(500),
    OUT pnCodigoPlaya INT, -- Parametro para guardar el codigo de playa generado
    OUT pcMensajeError VARCHAR(1000)
)
SP: BEGIN

    DECLARE vcTempMensajeError VARCHAR(500) DEFAULT ''; -- Variable para posibles errores no con	trolados
    DECLARE vcMensajeErrorServidor VARCHAR(500) DEFAULT ''; -- Variable para posibles errores no con	trolados
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
    
		
        GET DIAGNOSTICS CONDITION 1 vcMensajeErrorServidor = message_text;        
        ROLLBACK;
        
		
    
        SET vcTempMensajeError := CONCAT('Error: ', vcTempMensajeError, ' Server: ', vcMensajeErrorServidor);
        SET pcMensajeError := vcTempMensajeError;
    
    END;    

	-- Determinar si se agregara por ciudad o por municipio
    SET vcTempMensajeError := 'Al determinar si la playa se ingresara por municipio';
    IF pnCodigoMunicipio IS NOT NULL THEN
		BEGIN
        
			-- Agregar la playa por municipio
            
            -- Determinar si el municipio exise
            SET vcTempMensajeError := 'Al determinar si el municipio existe';
            IF NOT EXISTS
            (
				SELECT codMunicipio
                FROM iht_municipio
                WHERE pnCodigoMunicipio =  codMunicipio
            )
            THEN
				BEGIN
                
					SET pcMensajeError := 'El municipio seleccionado no existe';
                    LEAVE SP;
                
				END;
			END IF;
            
            
            SET vcTempMensajeError := 'Al insertar en la tabla de playas';
			INSERT INTO iht_playa (nombrePlaya, descripcionPlaya, telefonoPlaya1, 
								telefonoPlaya2, telefonoPlaya3, correoPlaya1, correoPlaya2)
			VALUES (pcNombre , pcDescripcion , pcTelefono1 , pcTelefono2 , pcTelefono3 , pcCorreo1 , pcCorreo2 );            
            
            SET vcTempMensajeError := 'Al obtener el codigo de playa generado';
            SET pnCodigoPlaya := LAST_INSERT_ID();
            
            SET vcTempMensajeError := 'Al insertar en la tabla de municipio-playa';
			INSERT INTO iht_ubicacionplayamunicipio (codMunicipio, codPlaya, posicionGoogleMapMunicipio)
			VALUES (pnCodigoMunicipio, pnCodigoPlaya, pcPosocionamiento);
        
		END;
    
    
    ELSE
		-- Agregar la playa por ciudad
		
		-- Determinar si la ciudad exise
		SET vcTempMensajeError := 'Al determinar si la ciudad existe';
		IF NOT EXISTS
		(
			SELECT codCiudad
			FROM iht_municipio
			WHERE pnCodigoCiudad =  codCiudad
		)
		THEN
			BEGIN
			
				SET pcMensajeError := 'La ciudad seleccionada no existe';
				LEAVE SP;
			
			END;
		END IF;
            
            
		SET vcTempMensajeError := 'Al insertar en la tabla de playas';
		INSERT INTO iht_playa (nombrePlaya, descripcionPlaya, telefonoPlaya1, 
							telefonoPlaya2, telefonoPlaya3, correoPlaya1, correoPlaya2)
		VALUES (pcNombre , pcDescripcion , pcTelefono1 , pcTelefono2 , pcTelefono3 , pcCorreo1 , pcCorreo2 );            
		
		SET vcTempMensajeError := 'Al obtener el codigo de playa generado';
		SET pnCodigoPlaya := LAST_INSERT_ID();
        
        SET vcTempMensajeError := 'Al insertar en la tabla de ciudad-playa';
		INSERT INTO iht_ubicacionplayaciudad (codCiudad, codPlaya, posicionGoogleMapCiudad)
		VALUES (pnCodigoCiudad, pnCodigoPlaya, pcPosocionamiento);
    
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-16 21:10:01
