<?php 

/*
 *
 *
 *
 **/
 set_include_path('core/');
 require_once('connect/connect.php');

 class Db {

 	private $table;
 	private $where;
 	private $fields
 	private $order;
 	private $limit;
 	private $offset;

 	public function __construct(){

 		//when need this write code in there;

 	}

 	/**
 	 *
 	 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 	 * "Setters and Getters"
 	 **/
 	public function setTable($table){

 		$this->table = $table;

 	}
 	public function getTable($table){

 		return $this->table;

 	}
 	public function setWhere($where){

 		$this->where = $where;

 	}
 	public function getWhere($where){

 		return $this->where;

 	}
 	public function setFields($fields){

 		$this->fields = $fields;

 	}
 	public function getFields($fields){

 		return $this->fields;

 	}
 	public function setOrder($order){

 		$this->order = $order;

 	}
 	public function getOrder($order){

 		return $this->order;

 	}
 	public function setLimit($limit){

 		$this->limit = $limit;

 	}
 	public function getLimit($limit){

 		return $this->limit;

 	}
 	public function setOffset($offset){

 		$this->offset = $offset;

 	}
 	public function getOffset($offset){

 		return $this->offset;

 	}

 }

 ?>