<?php
session_start();

// Check if the session is in progress (the user is logged in)
if (isset($_SESSION['nom_user'])) {
    // Initialize the shopping cart if it doesn't exist in the session
    if (!isset($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = array();
    }

    // The rest of your code for adding items to the cart
    if (isset($_POST["add_to_cart"])) {
        $product_id = $_GET["id"];
        $product_name = $_POST["hiddenname"];
        $product_price = $_POST["hiddenprice"];

        // Check if the product is already in the cart
        $item_exists = false;
        foreach ($_SESSION["shopping_cart"] as $key => $item) {
            if ($item["item_id"] == $product_id) {
                $item_exists = true;
                break;
            }
        }

        if (!$item_exists) {
            // Add the product to the cart
            $new_item = array(
                'item_id' => $product_id,
                'item_name' => $product_name,
                'item_price' => $product_price
            );
            $_SESSION["shopping_cart"][] = $new_item;
        } else {
            // Product already exists in the cart; you can handle this as needed
            // For example, you can show a message or perform some action
        }
    }

    // Continue with the rest of your HTML and code for displaying products and the cart
} else {
    // The user is not logged in, you can redirect them to a login page or display a message
    echo "You need to log in to add items to your shopping cart.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Fitbox Nos plats</title>
</head>

<body>

    <div class="container">
        <div class="row mt-3 align-items-center">
            <div class="col-4"><a href="index.php"><img src="img/logo.png" class="logo img-fluid" alt=""></a> </div>
            <div class="searchbox col-4">
                <form class="d-flex">
                    <input class="form-control border-0 search rounded-pill" type="search" placeholder="Rechercher des plats" aria-label="Search">
                    <div class="search-icon">
                        <span>
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-4 text-right">
                <button class="btn btn-group">
                    <span><i class="fas fa-shopping-cart a"></i></span>
                    <?php if (isset($_SESSION['shopping_cart']) && (count($_SESSION['shopping_cart']) > 0)) {
                        echo " <span class='badge badge-danger badge-counter' style='transform-origin: right; transform: scale(0.7); position: absolute;'> " . count($_SESSION['shopping_cart']) . " +</span>";
                    } ?>
                    <a href="panier.php" style="text-decoration: none; color: black;">
                        <span class="d-sm-block d-none ml-2 ">Panier</span>
                    </a>
                </button>
                <button class="btn btn-group">
                    <span><i class="far fa-user-circle"></i></span>
                    <a href="mon-compte.php" style="text-decoration: none; color: black;">
                        <span class="d-sm-block d-none ml-2">Utilisateur</span>
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 justify-content-sm-center d-flex mt-2">
                <nav class="navbar navbar-expand-sm ">
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                        <span class="navbar-toggler-icon "><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">ACCUEIL</a>
                            </li>
                            <li class="nav-item">
                                <a href="objectifs.php" class="nav-link">OBJECTIFS</a>
                            </li>
                            <li class="nav-item">
                                <a href="nosplats.php" class="nav-link">NOS PLATS</a>
                            </li>
                            <li class="nav-item">
                                <a href="bilaninfo.php" class="nav-link">BILAN</a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.php" class="nav-link">CONTACTER NOUS</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a href="" class="nav-link">BESOIN D'AIDE ? +216 58 123 123</a>
                            </li>
                            -->
                        </ul>
                    </div>
            </div>
            </nav>
        </div>
        <h3 class="text-center my-4">Nos plats</h3>
        <div class="dropdown"> <!--d-flex justify-content-end-->
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Trier par
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <form method="POST">
                    <input type="submit" name="croissant" class="dropdown-item" value="Prix croissant">
                    <input type="submit" name="decroissant" class="dropdown-item" value="Prix decroissant">
                    <input type="submit" name="calorieup" class="dropdown-item" value="Nombre de calories croissant">
                    <input type="submit" name="caloriedown" class="dropdown-item" value="Nombre de calories decroissant">
                </form>
            </div>
        </div>
        <div class="mt-5">
            <?php
            include("connect.php");
            $sql = "SELECT * from plat";
            $result2 = mysqli_query($con, $sql);
            $ligne2 = mysqli_fetch_array($result2, MYSQLI_NUM);
            if (isset($_REQUEST['croissant'])) {
                $sql = "SELECT * from plat order by prix desc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['decroissant'])) {
                $sql = "SELECT * from plat order by prix asc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['calorieup'])) {
                $sql = "SELECT * from plat order by nbr_calories asc";
                $result2 = mysqli_query($con, $sql);
            } else if (isset($_REQUEST['caloriedown'])) {
                $sql = "SELECT * from plat order by nbr_calories desc";
                $result2 = mysqli_query($con, $sql);
            }

            echo " <div class=\"row\">";
            while ($ligne2 = mysqli_fetch_array($result2)) {  ?>

                <div class="card-group col-lg-3 col-md-6 col-sm-12 mb-5 ">
                    <form method="POST" action="nosplats.php?action=add&id=<?php echo $ligne2['id_plat'] ?>">
                        <div class="card">

                            <img class="card-img-top get_id" src="<?php echo $ligne2['image'] ?>" alt="Card image cap" data-toggle='modal' data-target='#modalContactForm<?php echo $ligne2['id_plat'] ?>'>
                            <div class="card-body">
                                <h5 class="card-title nomplat"><?php echo $ligne2['nomplat'] ?></h5>
                                <div class="row">
                                    <div class="btn-group info col-4 ">
                                        <span class="infotext mr-2">Calories</span>
                                        <span class="nbrcalorie"><?php echo $ligne2['nbr_calories'] ?> Kcal</span>
                                    </div>

                                    <div class="btn-group info col-4">
                                        <span class="infotext mr-2">Graisses</span>
                                        <span class="nbrcalorie">test</span>
                                    </div>
                                    <div class="btn-group info col-4 ">
                                        <span class="infotext mr-2">Proteins</span>
                                        <span class="nbrcalorie">test</span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="hiddenname" value="<?php echo $ligne2['nomplat']  ?>">
                            <input type="hidden" name="hiddenprice" value="<?php echo $ligne2['prix']  ?>">
                            <div class="input-group rounded-pill mb-3 commanderbtn">
                                <button type="submit" name="add_to_cart" class="btn">
                                    <span class="mr-1"><?php echo $ligne2['prix'] ?>DT</span>
                                    <span class="mr-1 line">|</span>
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class='modal fade' id='modalContactForm<?php echo $ligne2['id_plat'] ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h2 class='modal-title' id='exampleModalLabel' style='color: #D6C900;'><?php echo $ligne2['nomplat'] ?></h2>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='row'>
                                    <img class='col-6' src='<?php echo $ligne2['image'] ?>'>
                                    <div class='col-6'>
                                        <h5 class='mb-3' style='color: #D6C900;'>Les Ingredients</h5>
                                        <p>Tomate</p>
                                        <p>Laitue</p>
                                        <p>Pomme de terre </p>
                                    </div>
                                </div>

                            </div>
                            <div class='modal-footer'>

                                <form method="POST" action="nosplats.php?action=add&id=<?php echo $ligne2['id_plat'] ?>">
                                    <input type="hidden" name="hiddenname" value="<?php echo $ligne2['nomplat']  ?>">
                                    <input type="hidden" name="hiddenprice" value="<?php echo $ligne2['prix']  ?>">
                                    <div class="btn-group modalbtn">
                                        <div class="input-group rounded-pill mb-3 commanderbtn2 mr-4">
                                            <button type="submit" name="add_to_cart" class="btn">
                                                <span class="mr-1"><?php echo $ligne2['prix'] ?>DT</span>
                                                <span class="mr-1 line">|</span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            echo "</div>";


            ?>
        </div>

    </div>
    </div>

    <!-- icons-->
    <link rel="stylesheet" media="screen" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
a{
  color:white;
}
footer{
    color:white;
    background-color:#706F6F;
    
}

.nav-light .nav-link {
    color: white !important;
}
.nav-light .nav-link:hover {
    color: #DEDC00 !important;
}
.d-inline-flex {
  display: grid !important;
}

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
*{
font-family: 'Montserrat', sans-serif;
}
</style>

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrap.css">
    <!-- Footer -->
    <footer class="cs-footer pt-sm-5 pt-4">
      
      <div class="container pt-3">


    
      
        <div class="row pb-sm-2">

        <div class="col-lg-4  col-md-3 d-inline-flex col-xl-3 mb-4 justify-content-center">
        <img src="img/logoblan.png" alt="" class="img-fluid">
            <div class="d-flex flex-wrap flex-sm-nowrap">
            <p class="justify-left">Ton meilleur guide </p>
             
            </div>
          </div>

          <div class="col-6 col-sm-3  col-md-3 col-lg-2 mb-4 ">
            <h3 class="h6 mb-2 pb-1 text-uppercase text-light">Pages</h3>
            <ul class="nav nav-light flex-column">
              <li class="nav-item mb-2">
                <a href="nosplats.php" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Plats</a>
              </li>
              <li class="nav-item mb-2">
                <a href="objectifs.php" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Objectifs</a>
              </li>
              <li class="nav-item mb-2">
                <a href="contact.php" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Contacter nous</a>
              </li>
              <li class="nav-item mb-2">
                <a href="bilaninfo.php" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Bilan</a>
              </li>
             
            </ul>
          </div>
          <div class="col-6 col-sm-3  col-md-3 col-lg-2 col-xl-3 mb-4">
            <h3 class="h6 mb-2 pb-1 text-uppercase text-light pl-xl-6">Objectifs</h3>
            <ul class="nav nav-light flex-column pl-xl-6">
              <li class="nav-item mb-2">
                <a href="#" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Perte du poids</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Mantien du poids</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link mr-lg-0 mr-sm-4 p-0 font-weight-normal">Gain du poids</a>
              </li>
              
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3  col-md-3 pb-2 pb-lg-0 mb-4">
            <h3 class="h6 mb-2 pb-1 text-uppercase text-light">Nous suivre sur</h3>
            
            <a href="#" class="social-btn sb-solid sb-light mr-2">
            <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="social-btn sb-solid sb-light mr-2">
            <i class="fa fa-instagram"></i>
            </a>
            <a href="#" class="social-btn sb-solid sb-light mr-2">
            <i class="fa fa-twitter"></i>
            </a>
            
          </div>
         
        </div>
         </div>
      <div class="border-top border-light">
        <div class="container py-4">
          <div class="font-size-xs text-dark">
            <span class="font-size-sm">&copy; </span>
            All rights reserved.
            
            
          </div>
        </div>
      </div>
    </footer>


    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
      <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span>
      <i class="btn-scroll-top-icon cxi-angle-up"></i>
    </a>


    




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>

</html>