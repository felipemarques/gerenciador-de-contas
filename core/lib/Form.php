<?php 
/**
 * Class responsible for filter form
 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 *
 **/
 Class Form 
 {
 	private static $error = '';

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	Array $fields 
 	 * @param 	String $where
 	 * @param 	String $limit
 	 * @return 	boolean
 	 *
 	 **/
 	public static function isCampoSet($request)
 	{

 		$error = "";

 		foreach($request as $value){
 			if($value == ''){

 				$error .= 'You ned set all fields';
 				return $error;

 			} else { 

 				return $error;

 			}
 		}

 	}
 }