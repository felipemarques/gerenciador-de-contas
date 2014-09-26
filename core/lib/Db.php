<?php 

/**
 * Class responsible for executing the queries of system
 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 *
 **/
set_include_path('core/');
require_once('db/connect/connect.php');

class Db 
{

 	//storage the table for consults
 	private static $table;

 	/**
 	 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 	 */
 	public function __construct($table){

 		//seting the table
 		$this->setTable($table);

 	}

 	/**
 	 *
 	 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 	 * Set the table for queries
 	 *
 	 **/
 	public function setTable($table)
 	{

 		Db::$table = $table;

 	}

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	Array $fields 
 	 * @param 	String $where
 	 * @param 	String $limit
 	 * @return 	Object $result
 	 *
 	 **/
 	public function getResultsObject($fields="", $where = "", $limit = "")
 	{


 		if($fields != "" && is_array($fields)):
 			$sql = 'SELECT ' . implode(',', $fields) . ' FROM ' . DB::$table;
 		else:
 			$sql = 'SELECT * FROM ' . DB::$table;
 		endif;

 		if($where != "") 			
 			$sql .=' WHERE ' . $where . '';

 		if($limit != "") 						
 			$sql .=' LIMIT '.$limit.'';

 		$result = Connect::getInstance()->query($sql);
		$result = $result->fetchAll(PDO::FETCH_OBJ);

		return $result;

 	}

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	Array $fields 
 	 * @param 	String $where
 	 * @param 	String $limit
 	 * @return 	Object $result
 	 *
 	 **/
 	public function getResultRow($fields = "", $where = "")
 	{
 		if($fields != "" && is_array($fields)):
 			$sql = 'SELECT ' . implode(',', $fields) . ' FROM ' . DB::$table;
 		else:
 			$sql = 'SELECT * FROM ' . DB::$table;
 		endif;

 		if($where != "") 			
 			$sql .=' WHERE ' . $where . '';

 		$result = Connect::getInstance()->query($sql);
		$result = $result->fetch(PDO::FETCH_OBJ);

		return $result;
 	}

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	Array $fields
 	 * @param 	Array $values
 	 * @param 	String $column
 	 * @param 	Int $id
 	 * @return 	boolean
 	 *
 	 **/
 	public function updateData($fields, $values, $column, $id)
 	{

 		if(is_array($fields) && is_array($values) && isset($id) && isset($column)){

 			if(count($fields) == count($values)){
 				
 				$content = '';
 				$i = 0;

 				while($i<count($fields)){
 					$content .= $fields[$i] . '="'.$values[$i].'"';
 					$content .= $i < count($fields)-1 ? ', ' : '';
 					$i++;
 				}
 				
 				$sql = 'UPDATE ' . DB::$table . ' SET ' . $content .' WHERE ' . $column . ' = ' . $id;

 				$p_sql = Connect::getInstance()->prepare($sql);
 				return $p_sql->execute();

 			}else{
 				//colocar erro de diferença de valores nos arrays
 			}


 		}else{
 			//colocar erro de parametros vazios
 		}

 	}

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	Array $fields
 	 * @param 	Array $values
 	 * @return 	boolean
 	 *
 	 **/
 	public function insertData($fields, $values)
 	{

 		if(is_array($fields) && is_array($values)){

 			if(count($fields) == count($values)){
 				
 				$sql = 'INSERT INTO ' . DB::$table . ' (' . implode(',', $fields) . ') VALUES ("' . implode('","', $values) . '")';

 				$p_sql = Connect::getInstance()->prepare($sql);
 				return $p_sql->execute();

 			}else{
 				//echo 'seu burro você está mandando um array com mais itens que o outro';
 			}


 		}else{
 			//echo 'cara, você precisa setar os campos necessários na chamada da função';
 		}

 	}

 	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	string $column
 	 * @param 	Array $id
 	 * @return 	boolean
 	 *
 	 **/
 	public function deleteData($column, $id)
 	{

 		if(isset($column) && is_array($id)){

 			$sql = 'DELETE FROM ' . DB::$table . ' WHERE  ' . $column . ' in ( ' . implode(", ", $id) . ')';

 		}else{
 			echo 'cara, você precisa setar os campos necessários na chamada da função';
 			return false;
 		}

 		$p_sql = Connect::getInstance()->prepare($sql);
 		return $p_sql->execute();

 	}

}