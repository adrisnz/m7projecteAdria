<?php
 class mPanell extends Model{

		function __construct(){
			parent::__construct();
		}


			function recuperar_usuari(){


			$sql="SELECT * FROM users WHERE email=?";
			$sql2="SELECT * FROM sessions WHERE session=?";

   			$query=$this->db->prepare($sql);

     		$query->bindParam(1,$email);




			return $this->data_out;
		}





		function modificarcorreu($email){      /**
*@return aquesta funció permet modificar a un usuari el seu correu. Elimino per la variable de sessió
*/


  try{
     $sql="UPDATE users SET email=? WHERE email='".$_SESSION['email']."'";
     //var_dump($sql);s
     $query=$this->db->prepare($sql);
     $query->bindParam(1,$email);
     $query->execute();

      $_SESSION['email']=$email;

    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }

}


function eliminarusuari()
      /**
*@return esta funcion elimina un usuario de la base de datos y destruye la sesión
*/
{

  try{
     $sql="DELETE FROM users WHERE email='".$_SESSION['email']."'";
     //var_dump($sql);s
     $query=$this->db->prepare($sql);
     $query->execute();


    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }

   session_destroy();

}



		
	}