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

 		try {

	 		//seting the table
	 		$this->setTable($table);
 			
 		} catch (Exception $e) {
 			Log::createLog('Não foi possível setar a tabela, erro: ' . $e);
 		}

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

 		try {

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
 			
 		} catch (Exception $e) {

 			Log::createLog('Não foi possível obter os resultados do objeto, erro: ' . $e);
 			
 		}

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
 		try {

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
 			
 		} catch (Exception $e) {
 			Log::createLog('Não foi possível obter os resultados da linha, erro: ' . $e);
 		}
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

 		try {
 			
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
	 				Log::createLog('Nós não conseguimos fazer o update quando você envia arrays de tamanho diferente!');
	 			}


	 		}else{
	 			Log::createLog('Por gentileza envie os dados necessários para o update');
	 		}

 		} catch (Exception $e) {

 			Log::createLog('Encontramos um problema e não conseguimos fazer o update, erro: ' . $e);
 			
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
 		try {

 			if(is_array($fields) && is_array($values)){

	 			if(count($fields) == count($values)){
	 				
	 				$sql = 'INSERT INTO ' . DB::$table . ' (' . implode(',', $fields) . ') VALUES ("' . implode('","', $values) . '")';

	 				$p_sql = Connect::getInstance()->prepare($sql);
	 				return $p_sql->execute();

	 			}else{
	 				Log::createLog('Nós não conseguimos fazer o insert quando você envia arrays de tamanho diferente!');
	 			}


	 		}else{
	 			Log::createLog('Por gentileza envie os dados necessários para o update');
	 		}
 			
 		} catch (Exception $e) {
 			Log::createLog('Encontramos um problema e não conseguimos fazer o insert, erro: ' . $e);
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
 		try {

 			if(isset($column) && is_array($id)){

	 			$sql = 'DELETE FROM ' . DB::$table . ' WHERE  ' . $column . ' in ( ' . implode(", ", $id) . ')';

	 		}else{

	 			Log::createLog('Por gentileza envie os dados necessários para o delete');
	 			return false;
	 			
	 		}

	 		$p_sql = Connect::getInstance()->prepare($sql);
	 		return $p_sql->execute();
 			
 		} catch (Exception $e) {

 			Log::createLog('Encontramos um problema e não conseguimos fazer o delete, erro: ' . $e);
 			
 		}

 	}

}