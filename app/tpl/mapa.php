<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
  <section>


<ul style="display:inline;">
<a style="text-decoration:none;" href="<?= APP_W.''?>">INICI</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'reg'?>">REGISTRE</a></li>
<li style="display:inline; margin-left:10%;"><a style="text-decoration:none;" href="<?= APP_W.'mapa'?>">MAPA</a></li>

</ul>
<div style="text-align:center;">

    <h2>MAPA</h2>





<div id="googleMap" style="width:500px;height:380px;"></div>

</div>


  

  </section>