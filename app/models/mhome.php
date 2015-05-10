<?php
/**
*@author Adria Sanchez Caballe
*/
	final class mHome extends Model{
		
		function __construct($params){
			parent::__construct($params);
			$this->db=DB::singleton();
			// a litle prove in--->out
			$this->data_out=$params;
		}
		function get_out(){
			return $this->data_out;
		}
		

			function reg($name,$email,$password){ 

      /**
*@return esta funcion inserta un usuario en la base de datos
*/
  try{
     $sql="INSERT INTO users (name, email, password) VALUES(?, ?, ?)";
     $query=$this->db->prepare($sql);
     $query->bindParam(1,$name);
     $query->bindParam(2,$email);
     $query->bindParam(3,$password);
  
     $query->execute();



     if($query->rowCount()==1){



        //   Session::set('islogged',TRUE);
          // Session::set('email',$email);

           return TRUE;

     }
     else {
        // Session::set('islogged',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}



		function login($email,$password){

            /**
*@return esta funcion hace un login 
*/
  try{
     $sql="SELECT * FROM users WHERE email=? AND password=?";
     $query=$this->db->prepare($sql);
     $query->bindParam(1,$email);
     $query->bindParam(2,$password);

     $query->execute();

     if($query->rowCount()==1){

session_start();

$_SESSION['email']=$_POST['email'];
//$_SESSION['contrasenya']=$_POST['password'];


           //Session::set('islogged',TRUE);
           //Session::set('email',$email);

           return TRUE;

     }
     else {
         //Session::set('islogged',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}




	}