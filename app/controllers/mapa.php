<?php
	class Mapa extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mMapa;
			$this->view=new vMapa;
		}
		function home(){
						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
			
		}
	}