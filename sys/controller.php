<?php
	/**
	 *  Controller
	 *  
	 *  @author Toni
	 *  @package sys
	 * 
	 * 
	 * */
	
	class Controller{
		protected $model;
		protected $view; 
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			$this->conf=Registry::getInstance();
		}

		function json($output){
			ob_clean();
			if(is_array($output)){
				echo json_encode($output);
			}
		}
	}