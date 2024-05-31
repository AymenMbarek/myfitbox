
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fitbox</title>


    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons-->
    <link rel="stylesheet" media="screen" href="css/tiny-slider.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrap.css">
    
    <!-- Page loading styles-->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
*{
    font-family: 'Montserrat', sans-serif;
}
.cxi-search{
  color:#D6C900;
}
      
      .searchic {
  background: none;
  padding: 0px;
  border: none;
}
    
    </style>

  </head>
  <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "6020577fdb8f1400076d7225";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->


  <!-- Body-->
  <body>
    <main class="cs-page-wrapper">
      <header>
       
        <div class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky pt-3 w-100" >
          <div class="container px-0 px-xl-3 ">
            <a href="index.php" class="navbar-brand mr-0 pr-lg-3 mr-lg-4">
              <img src="img/logo.png" alt="fitbox Logo" width="130">
            </a>
            <!-- Search desktop -->
              <div class="input-group-overlay ml-4 d-lg-block d-none order-lg-3 " style="max-width: 30rem;">
              <div class="search-box">
                <input class="form-control appended-form-control search rounded-pill "  type="text" placeholder="Chercher un plat...">
                <div class="result"></div>
              </div>
                <div class="input-group-append-overlay">
                <form action="inc/search.php" method="post">
                  <button type="submit" class="searchic">
                    <span class="input-group-text"><i class="cxi-search lead align-middle " ></i></span>
                  </button>
                </form>
                </div>
              </div>
              
          
            <!-- Toolbar -->
            <div class="d-flex align-items-center order-lg-3">
              <ul class="nav nav-tools flex-nowrap  ">
                <li class="nav-item align-self-center mb-0">
                  <a href="panier.php" class="nav-tool pr-lg-0" >
                    <i class="fas fa-shopping-cart a"></i>
                    <?php if (isset($_SESSION['shopping_cart']) && (count($_SESSION['shopping_cart']) > 0)) {
                        echo " <span class='badge badge-danger badge-counter' style='transform-origin: right; transform: scale(0.7); position: absolute;'> " . count($_SESSION['shopping_cart']) . " +</span>";
                    } ?>
                  </a>
                </li>

                <div class="input-group-overlay  mb-0 d-lg-none d-block d-flex align-items-center"> 
                  <ul class="nav">
                    <li class="divider-vertical mb-0 d-lg-none d-block"></li>
                  <li class="nav-item mb-0">
                    <a href="#" class="nav-tool pr-lg-0" data-toggle="offcanvas" data-target="profile">
                      <i class="cxi-profile nav-tool-icon"></i>
                      <span class="badge badge-success align-middle mt-n1 ml-2 px-2 py-1 font-size-xs"></span>
                    </a>
                  </li>
                  </ul>
                </div>

                <li class="divider-vertical mb-0 d-lg-none d-block"></li>
                <li class="nav-item mb-0">
                  <button class="navbar-toggler mt-n1 mr-n3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </li>
              </ul>
              <?php 
                                 if (!isset($_SESSION['nom_user']) || empty($_SESSION['nom_user'])){  ?>
                                                                   <a href="mon-compte.php" class="topbar-link d-lg-inline-block d-none ml-4 pl-1 text-decoration-none text-nowrap"><i class="far fa-user-circle"></i>Utilisateur</a>

              <?php }
              else {  ?>

              <div class="dropdown">
                <a href="#" class="topbar-link  d-lg-inline-block d-none ml-4 pl-1 text-decoration-none text-nowrap" data-toggle="dropdown">
                  <i class="far fa-user-circle"></i>
                  Utilisateur
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="mon-compte.php" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-profile font-size-base mr-2"></i>
                    <span>Mon compte</span>
                  </a>
                  <a href="mescommandes.php" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-bag font-size-base mr-2"></i>
                    <span>Mes commandes</span>
                  </a>
                  <a href="bilan.php" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-info font-size-base mr-2"></i>
                    <span>suivi du poids</span>
                  </a>
                  
                  <div class="dropdown-divider"></div>
                  <a href="logout.php" class="dropdown-item d-flex align-items-center">
                    <i class="cxi-logout font-size-base mr-2"></i>
                    <span>Déconnexion</span>
                  </a>
                </div>
              </div>
                <?php 
                                }
                                ?>
            </div>
            </div>
            <!-- Navbar collapse -->
          

            
          </div>
        </div>




      





         <!-- Navbar -->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
        <div class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky" data-fixed-element>
          <div class="container px-0 px-xl-3">
            
           
            
            <!-- Navbar collapse -->
            <nav class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
              <!-- Search mobile -->
              <div class="input-group-overlay form-group mb-0 d-lg-none d-block">
                <input type="text" class="form-control prepended-form-control rounded-0 border-0" placeholder="Chercher un produit ...">
                <div class="input-group-prepend-overlay">
                  <span class="input-group-text">
                    <i class="cxi-search font-size-lg align-middle mt-n1"></i>
                  </span>
                </div>
              </div>
              <!-- Menu -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="objectifs.php" class="nav-link">Objectifs</a>
                </li>
                <li class="nav-item">
                  <a href="nosplats.php" class="nav-link" >Not Plats</a>
                </li>
                <li class="nav-item">
                  <a href="bilaninfo.php" class="nav-link" >Bilan</a>
                </li>
                <li class="nav-item">
                  <a href="contact.php" class="nav-link" >Contacter Nous</a>
                </li>
                <li class="nav-item">
                  <a href="chat/index.php" class="nav-link" >Système de chat</a>
                </li>
               <!-- <li class="nav-item">
                  <a href="tel:58917123" class="nav-link">
                  Besoin D'aide ? sur
                  <span class=''>58 917 123</span>
                </a>
              </li> -->
             
               
              </ul>
            </nav>
          </div>
        </div>

        



      </header>
 <!-- Vendor scripts: js libraries and plugins-->
 <script src="js/jquery.slim.min.js"></script>
 <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/smooth-scroll.polyfills.min.js"></script>

 


 <!-- Main theme script-->
 <script src="js/fit.js"></script>