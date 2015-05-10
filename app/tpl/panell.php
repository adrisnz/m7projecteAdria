<body>        
    <header>
          <div class="header-tit">
            <div id="wrapper">
            <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W.'pub/theme/k/'.$logo;?>"/></a>
            </div>
          </div> 
 


            <?php  if(isset($_SESSION['email'])){ //miro si ja existeix sessió, d'haberla, trec el formulari de login
                                                  //i li dono la benvinguda

      echo 'Benvingut de nou '.$_SESSION['email'];


      echo '<div><form name="tancarsessio" method="post" action="'.APP_W.'home/tancar">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <input type="submit" class="bEntra" value="TANCAR SESSIÓ" id="inp_tancar">
                </form></div>';

    echo '<p><a href="'.APP_W.'panell">MODIFICAR USUARI</p>';


    }else{

 echo '<div class="regist"> 
                <form class="reg" name="formlog" method="post" action="'.APP_W.'home/login">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="email">Email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                    <label for="password">Password<input type="password" name="password" required></label>
                    <input type="submit" class="bEntra" value="Entra" id="logsend">
                </form>
           
              </div>';

    }
 ?>
             
  </header>
  <section>

<ul style="display:inline;">
<a style="text-decoration:none;" href="<?= APP_W.''?>">INICI</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'reg'?>">REGISTRE</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'mapa'?>">MAPA</a></li>

</ul>


    <h2>MODIFICAR USUARI (només correu)</h2>



 <form class="reg" name="formmodificar" method="post" action="<?= APP_W.'panell/modificarcorreu'?>">


        Email<input type="email" name="email" value="<?= $_SESSION['email'];?>">
   <!-- Contrasenya<input type="password" name="password">-->
<input type="submit" class="bEntra" value="MODIFICAR CORREU" id="logsend">


</form>


 <form class="reg" name="formeliminar" method="post" action="<?= APP_W.'panell/eliminarusuari'?>">


<input type="submit" class="bEntra" value="ELIMINAR (acció irreversible)" id="logsend">


</form>
  

  </section>