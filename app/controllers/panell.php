<?php
	class Panell extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mPanell;
			$this->view=new vPanell;
		}
		function home(){



						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
			
		}




		 	function modificarcorreu(){

         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

         $user=$this->model->modificarcorreu($email);

 }


 	function eliminarusuari(){       /**
*@return esta funcion llama al modelo para eliminar un usuario
*/


         $user=$this->model->eliminarusuari();

 }



	}