

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fitbox - Accueil</title>


    <?php
  session_start();
include('connect.php');
?>

    <!-- icons-->
    <style>
      .bg-secon {
    background-color: #c1c0c0 !important;
}
    </style>
    <link rel="stylesheet" media="screen" href="css/style.css"/>
    <link rel="stylesheet" media="screen" href="css/s.css"/>
    <link rel="stylesheet" media="screen" href="css/tiny-slider.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrapp.css">
    
    <!-- Page loading styles-->
    <style>
      .mb-3, .my-3 {
    margin-bottom: 2rem !important;
}
    .mt-7{
      margin-top: -1.75rem !important;
        }
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
*{
    font-family: 'Montserrat', sans-serif;
}
.cxi-search{
  color:#D6C900;
}
@media (min-width: 768px){
.m4 {
  margin-left: 20.5rem !important;
  margin-top: 3.5rem !important;
  
}}

      .cs-page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .cs-page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .cs-page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .cs-page-loading.active > .cs-page-loading-inner {
        opacity: 1;
      }
      .cs-page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #787a80;
      }
      .cs-page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        background-color: #cfcfd1; 
        border-radius: 50%;
        opacity: 0;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      @-webkit-keyframes spinner {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        50% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
      @keyframes spinner {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        }
        50% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
      
      .searchic {
  background: none;
  padding: 0px;
  border: none;
}

    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }


@media (min-width: 992px){
.pl-lg-5, .px-lg-5 {
    padding-left: 3rem !important;
}

@media (min-width: 992px){
.pr-lg-5, .px-lg-5 {


    padding-right: 3rem !important;
}}}
    </style>

    <!-- Page loading scripts-->
    <script>
      (function () {
        window.onload = function () {
          var preloader = document.querySelector('.cs-page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 2000);
        };
      })();
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("inc/search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    </script>


  </head>


  <!-- Body-->
  <body>
    

    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="cs-page-wrapper">
      
      

      
      <?php 
              include("header.php") ?>
 <!-- Vendor scripts: js libraries and plugins-->
 <script src="js/jquery.slim.min.js"></script>
 <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/smooth-scroll.polyfills.min.js"></script>

 


 <!-- Main theme script-->
 <script src="js/fit.js"></script>










    <style>
    body{
    overflow-x:hidden;
}

    </style>
     </head>

     <body>
      <!-- Hero slider -->
      <section class="cs-carousel cs-controls-onhover">
        <div class="cs-carousel-inner mb-5" data-carousel-options='{
          "mode": "gallery",
          "navContainer": "#pager",
          "responsive": {
            "0": { "controls": false },
            "991": { "controls": true }
          }
        }'>

          <!-- Slide 1 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(7.jpg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-left cs-delay-1"></h3>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-from-left text-light">Changer votre style</h2>
                  <div class="mb-4 cs-scale-up cs-delay-2">
                    <a href="nosplats.php" class="btn btn-primary btn-lg">Voir nos plats</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(sl1.jpeg);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h2 class="display-2 mb-lg-5 pb-3 text-light cs-scale-down">Varieté des plats</h2>
                  <div class="mb-4 cs-scale-down cs-delay-2">
                    <a href="shop-catalog.html" class="btn btn-primary btn-lg">Voir plus</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="bg-size-cover py-xl-6" style="background-image: url(sl2.JPG);">
            <div class="container pt-5 pb-6">
              <div class="row pb-lg-6">
                <div class="col-lg-6 offset-lg-1 offset-xl-0 pb-4 pb-md-6">
                  <h3 class="font-size-lg text-uppercase cs-from-left cs-delay-1">Faciliter les choses et</h3>
                  <h2 class="display-2 mb-lg-5 pb-3 cs-from-left text-light">Planifier votre semaine</h2>
                  <div class="mb-4 cs-scale-up cs-delay-2">
                    <a href="shop-catalog.html" class="btn btn-primary btn-lg">Commander</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>

        <!-- Pager -->
        <div class="container position-relative">
          <div class="row mt-lg-n5">
            <div class="col-lg-7 col-md-8 col-sm-10 offset-lg-1 offset-xl-0">
              <div class="position-relative">
                <div id="pager" class="cs-pager cs-pager-inverse mb-xl-5 pb-5 pb-md-6">
                  <button type="button" data-nav="0">01</button>
                  <button type="button" data-nav="1">02</button>
                  <button type="button" data-nav="2">03</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      


     
           


  
      


      <!-- apropos nous -->
      <section class="container py-5 order-first">
        <div class="row">

          <div class="col-md-5 pr-md9 mb-3" sable-parallax-down="md">
            <div class="py-4 px-lg-4 px-sm-2 px-1 bg-light rounded box-shadow-sm">
              <div class=" text-right lead font-weight-bold" >
              
                <div class=" mr-4 text-right lead font-weight-bold">
                    <p >Apropos</p>
                    <p class="mt-7 mr-0 text-primary text-right">de nous</p>
                </div>
                    
                        <p class="pr-sm-4 mr-7 font-weight-light text-right"> Fitbox vous offre un service de restauration
                            et de personnalisation des repas: des repas pour un jour,
                            une semaine ou un mois,préparation des plats personnalisés,
                            personnalisez votre propre régime avec les choses que vous aimez et faites-le livrer à votre porte
                        </p>
                    
            
                
                
              </div>
            </div>
          </div>

          <!--photo -->
          <div class="col-lg-7 px-2 mb-3">
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center-y rounded py-5 px-md-5 px-4" style="background-image: url(img/salade.jpg);">
              
              
              
            </div>
          </div>
        </div>
        <div class="row mx-n2">
      </section>
          

      <!-- les plats -->
      <section class="container  mb-3  py-5 "> 
            <h2 class="h2 mb-5  text-center">Les plats de la semaine</h2>
        <div class="album py-5 mx-auto ">
          <div class="container">

             <div class="row">
                <div class="col-md-4 ">
                     <div class="card mb-4 box-shadow">
                      <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                      <div class="card-body">
                     <table>
                        <tr class="titretable">
                         <td>Calories</td>
                         <td>Proteines</td>
                          <td>Graisses</td>
                        </tr>
                          <tr>
                           <td>1200</td>
                          <td>350</td>
                           <td>20</td>
                      
                         </tr>
                      </table>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex">
                          <div class="action btn-group">
                            <button type="button"  class="btn btn-sm" >7DT|
                            <a href="#">Commander</a> </button>
                          </div>
                
                        </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="img/2.jpg" alt="Card image cap">
            <div class="card-body">
                <table>
                    <tr class="titretable">
                      <td>Calories</td>
                      <td>Proteines</td>
                      <td>Graisses</td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td>350</td>
                      <td>20</td>
                      
                    </tr>
                  </table>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center ">
                <div class="btn-group ">
                  <button type="button"  class="btn btn-sm" >7DT|
                  <a href="#">Commander</a> </button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="img/3.jpg" alt="Card image cap">
              <div class="card-body">
                <table>
                    <tr class="titretable">
                      <td>Calories</td>
                      <td>Proteines</td>
                      <td>Graisses</td>
                    </tr>
                    <tr>
                      <td>1200</td>
                      <td>350</td>
                      <td>20</td>
                      
                    </tr>
                  </table>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button"  class="btn btn-sm" >12DT|
                        <a href="#">Commander</a> </button>
                      </div>
                  
                </div>
              </div>
            </div>
          </div>
        
          
       </div>
         </div>
          <div class="text-center pt-4 pt-md-5">
            <a href="nosplats.php" class="btn btn-outline-primary btn-lg">Voir tous les plats </a>
          </div>
        </div>
  

      </section>


      
       <!-- Approach -->
       <section class="pt-lg-3 pb-1">
        <h2 class="h2 mb-5 pb-3 text-center">Processus du service</h2>
        

        <!-- Carousel -->
        <div class="container px-0">
          <div class="cs-carousel cs-nav-outside mt-n4 ml-lg-n0">
            <div class="cs-carousel-inner pt-4 pl-lg-5" data-carousel-options='{
              "loop": false,
              "controls": false,
              "responsive": {
                "0": {
                  "items": 1
                },
                "576": {
                  "items": 2
                },
                "768": {
                  "items": 3
                },
                "992": {
                  "items": 4
                }
              }
            }'>

              <!-- Horizontal step item -->
              <div class="cs-step pt-2 px-3">
                <div class="cs-step-head mb-3">
                  <span class="cs-step-indicator">01</span>
                  <span class="cs-step-line"></span>
                </div>
                <div class="cs-step-body">
                  <h3 class="h5 mb-2">Passer la commande</h3>
                  <p class="mb-0 text-muted">Sélectionnez le type de forfait que vous souhaitez et commandez-le</p>
                </div>
              </div>

              <!-- Horizontal step item -->
              <div class="cs-step pt-2 px-3">
                <div class="cs-step-head mb-3">
                  <span class="cs-step-indicator">02</span>
                  <span class="cs-step-line"></span>
                </div>
                <div class="cs-step-body">
                  <h3 class="h5 mb-2">Personnalisation</h3>
                  <p class="mb-0 text-muted">Sélectionnez le type de forfait que vous souhaitez et commandez-le</p>
                </div>
              </div>

              <!-- Horizontal step item -->
              <div class="cs-step pt-2 px-3">
                <div class="cs-step-head mb-3">
                  <span class="cs-step-indicator">03</span>
                  <span class="cs-step-line"></span>
                </div>
                <div class="cs-step-body">
                  <h3 class="h5 mb-2">Faire ton choix Livraison</h3>
                  <p class="mb-0 text-muted">Votre plat est prêt à portée</p>
                </div>
              </div>

              <!-- Horizontal step item -->
              <div class="cs-step pt-2 px-3">
                <div class="cs-step-head mb-3">
                  <span class="cs-step-indicator">04</span>
                </div>
                <div class="cs-step-body">
                  <h3 class="h5 mb-2"> Paiement</h3>
                  <p class="mb-0 text-muted">Choisir la méthode de paiement souhaitée</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<!-- recette -->
      <section class="container py-lg-6 py-5 order-first">
        <h2 class="h2 mb-5 pb-3 text-center">Recette de la semaine</h2>
        <div class="row">

          
          <div class="col-md-5 pr-md9 mb-3" sable-parallax-down="md">
            
            <div class="py-4 px-lg-4 px-sm-2 px-1 bg-light rounded box-shadow-sm">
              <div class=" text-right lead font-weight-bold" >
              
                <div class=" mr-4 text-right lead font-weight-bold">
                    <p >Riz aux</p>
                    <p class="mt-7 mr-0 text-primary text-right">légumes</p>
                </div>
                    
                        <p class="pr-sm-4 mr-7 font-weight-light text-right" style="line-height:1;"> <span style="font-weight: bold;">1.</span> Couper le poivron et les oignons en cubes. Garder le vert des oignons nouveaux pour la décoration.
                          <br>
                          <span style="font-weight: bold;">2.</span> Dans une poêle ou un wok, chauffer l’huile à feu vif. Saisir le poivron, l’oignon  deux minutes. Ajouter  l’ail, le riz et la sauce soja. Chauffer de 3 à 4 minutes à feu vif en remuant. Rectifier l’assaisonnement.
                          <br>
                          <span style="font-weight: bold;">3.</span> Au moment de servir, ajouter l’huile de sésame et les petits pois et remuer. Saupoudrer de graines de sésame et de coriandre.
                        </p>
                    
            
                
                
              </div>
            </div>
          </div>

          <!-- photo -->
          <div class="col-lg-7 px-2 mb-3">
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center-y rounded py-5 px-md-5 px-4" style="background-image: url(img/4.jpg);">
              
              
              
            </div>
          </div>
        </div>
        <div class="row mx-n2">
      </section>
          


      


      

      <!-- Insagram -->
      <section class="pt-5 pb-4 pt-lg-6 pb-lg-5 border-top border-bottom">
        <div class="container pt-md-4 pb-2 pt-lg-0 pb-lg-0">
          <div class="row">
            <div class="col-md-4 text-center text-md-left pb-2 pb-md-0 mb-4 mb-md-0">
              <p class="text-dark text-uppercase mb-2">Suivez nous sur Instagram</p>
              <h2 class="h1 pb-2 pb-md-3">@Fitbox_tn</h2>
              <a href="#" class="btn btn-outline-primary btn-lg">
                <i class="cxi-instagram font-size-lg mr-1"></i>
                S'abonner à Instagram
              </a>
            </div>
            <div class="col-md-8">
              <div class="cs-carousel cs-nav-outside">
                <div class="cs-carousel-inner" data-carousel-options='{
                  "controls": false,
                  "gutter": 15,
                  "responsive": {
                    "0": { "items": 2 },
                    "500": { "items": 3 },
                    "1200": { "items": 3 }
                  }
                }'>
                  <!-- Image -->
                  <div>
                    <img src="img/real1.jpg" alt="Image" class="img-thumbnail">
                  </div>
                  <!-- Image -->
                  <div>
                  <img src="img/real3.jpg" alt="Image" class="img-thumbnail">
                  </div>
                  <!-- Image -->
                  <div>
                  <img src="img/real2.jpg" alt="Image" class="img-thumbnail"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


     
    
      <!-- Subscription CTA -->
     <section class="bg-secon">
        <div class="container  pt-md-3 ">
          <div class="row align-items-center">
            <form class="col-md-6 col-xl-5 needs-validation" novalidate>
              <!--<h2 class="h1 mb-3 text-primary">Newsletter</h2>
              <p class="text-light font-size-lg pb-3 mb-4">Abonnez-vous pour recevoir nos dernières promotions.</p>
              <div class="form-group pt-4">
                <label for="s-email">Email</label>
                <div class="input-group input-group-lg">
                  <input type="email" id="s-email" class="form-control" placeholder="Your email address" required>
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Subscribe</button>-->
                  </div>
                </div>
              </div>
            </form>
            <div class="col-md-6 col-xl-7 d-none d-md-block">
              <div class="ml-auto" style="max-width: 459px;">
                <img src="img/chicken.png" class="d-block" alt="Illustration">
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <section>
    <div class="rappel">
      <!--
       <a href="#" class="text-light justify-center"> Commander maintenant</a>
        -->
    </div>
   </section>
             



    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
      <i class="btn-scroll-top-icon cxi-angle-up"></i>
    </a>

<?php include "footer.php"; ?>
    <!-- Vendor scripts: js libraries and plugins-->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/tiny-slider.js"></script>

    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>