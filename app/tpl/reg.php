<body>        
    <header>
          <div class="header-tit">
            <div id="wrapper">
            <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W.'pub/theme/k/'.$logo;?>"/></a>
            </div>
          </div> <!-- from div header-tit -->
          <!-- user register div -->  
            <?php  if(isset($_SESSION['email'])){

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

<ul style="display:inline;">
<a style="text-decoration:none;" href="<?= APP_W.''?>">INICI</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'reg'?>">REGISTRE</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'mapa'?>">MAPA</a></li>

</ul>

  <section>
    <h2>REGISTRAR NOU USUARI</h2>

                <?php  if(isset($_SESSION['email'])){ //si algú està loguejat, no el deixarà crear un compte


                  echo 'No es permet crear més dun compte';


                }else{

    echo '<div class="formreg">
                <form class="registre" name="formregister" method="post" action="'.APP_W.'home/reg">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="name">Name<input type="text" name="name" value="" placeholder="e@mail" required></label>
                    
                    <label for="email">email<input type="text" name="email" value="" placeholder="e@mail" required></label>
                    <label for="password">password<input type="password" name="password" required></label>
                    <input type="submit" value="Regsiter" id="regsend">
                </form>
           
              </div>';
                }

                 ?>






  </section>