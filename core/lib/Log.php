<?php 
/**
 * Class responsible for create and write log of application
 * @author Renato Rodrigues renato@rlsrodrigues.com.br
 *
 **/
Class Log
{
	private static $date;
	private static $file;

	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @param 	String $mensagem
 	 * @return 	boolean
 	 *
 	 **/
	public static function createLog($message){

		date_default_timezone_set('America/Sao_Paulo');

		Log::$file = LOG_PATH.LOG_FILE;

		Log::$date = Log::getCurrencyDateTime();
		$content = '[' . Log::$date . '] - ' ;
		$content .= $message . PHP_EOL;

		try {
		
			file_put_contents(Log::$file, $content, FILE_APPEND);
			
		} catch (Exception $e) {
			echo 'Ocorreu um problema na aplicação e não consegui nem gravar o log do erro - ' . $e;
		}

	}

	/**
 	 *
 	 * @author 	Renato Rodrigues renato@rlsrodrigues.com.br
 	 * @return 	String $dt
 	 *
 	 **/
	private static function getCurrencyDateTime(){

		$dt = date("Ymd H:m:s");
		return $dt;

	}
}