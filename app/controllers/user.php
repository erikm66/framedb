<?php 

	class User extends Controller{
		protected $model;
		protected $view;

		function __construct($params){
			parent::__construct($params);
			$this->model=new mUser();
			$this->model=new vUser();
		}

		function home(){
			//Coder::codear($this->conf);
	}

	}