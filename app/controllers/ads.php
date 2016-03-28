<?php
	
	class Ads extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mAds();
			$this->view= new vAds();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}

}