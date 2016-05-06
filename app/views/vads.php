<?php
	/**
	 *  vHome
	 *  Prepares and loads the corresponding Template
	 *  @author Toni
	 * 
	 * */
	class vAds extends View{

		function __construct(){
			parent::__construct();
			$this->tpl=Template::load('ads',$this->view_data);
			
		}

	}