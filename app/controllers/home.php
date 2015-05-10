<?php
	final class home extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mHome($params);
			$this->view=new vHome;
		}
		function home(){
			//we can comprove that we pass the parameters
			//var_dump($this->params);
			//echo "   Action";
			//Accedim a valors de configuració
			Coder::code_var($this->model->get_out());
			echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
		}
		/*
		function login(){
			$user=$_POST['email'];
			echo $user;
		}*/


		function login(){

   if(isset($_POST['email'])){
         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
         $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
         $user=$this->model->login($email,$password);
         if ($user== TRUE){



               // cap al panell
               header('Location:'.APP_W.'panell');
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'reg');
             }
   }
 }

 		function tancar(){

session_destroy();

               header('Location:'.APP_W);

 }




 function reg(){

      $name=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
      $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
      $password=md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
	$user=$this->model->reg($name,$email,$password);


 }


	}