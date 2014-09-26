<?php 
/**
 *
 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 * DB Connections
 *
 **/

//necessary files
set_include_path('core/');
require_once('config/config.php');

class Connect { 
	
	public static $instance; 
	
	private function __construct()
	{ 
		//
	} 

	public static function getInstance() 
	{ 
		try {

			if (!isset(self::$instance)) { 
				self::$instance = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			} 

			return self::$instance; 
			
		} catch (Exception $e) {

			Log::createLog('Não foi possível conectar ao banco de dados erro: ' . $e);
			
		}
		
	} 
}