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

		
function showads(){
  $numpag=filter_input(INPUT_POST, 'npag', FILTER_SANITIZE_NUMBER_INT);
    $ads=$this->model->showads();
    if($ads!=0){
      $this->json($ads);
    }else{
      return $ads;
    }

 }

 function addad(){
  $titulo=filter_input(INPUT_POST, 'tit', FILTER_SANITIZE_STRING);
  $desc=filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
  $img1=filter_input(INPUT_POST, 'img1', FILTER_SANITIZE_STRING);
  $img2=filter_input(INPUT_POST, 'img2', FILTER_SANITIZE_STRING);
  $img3=filter_input(INPUT_POST, 'img3', FILTER_SANITIZE_STRING);
  $lat=filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
  $long=filter_input(INPUT_POST, 'longi', FILTER_SANITIZE_STRING);
  /*$titulo='test21';
  $desc='test21';
  $img1='test21';
  $img2='test21';
  $img3='test21';
  $lat='-74.0059731';
  $long='40.712784';*/
    $ads=$this->model->addad($img1,$img2,$img3,$titulo,$desc,$lat,$long);
    if($ads!=0){
      $this->json($ads);
    }else{
      return $ads;
    }

 }






}