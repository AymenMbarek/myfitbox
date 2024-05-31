<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Commande</title>
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
session_start();
include "connect.php";

$note = $_POST["note"];
$liv = $_POST["shipping"];
$payment = $_POST["payment"];

if (!empty($_SESSION["shopping_cart"])) {
    $total = 0;

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        $total = $total + $values["item_price"];
    }

    if (empty($_SESSION["shopping_cart"])) {
        echo "<div class='container-fluid mt-100'>
                <div class='row mt-5'>
                    <div class='col-md-12'>
                        <div class=''>
                            <div class='col-sm-12 text-center'>
                                <img src='./img/emptycart.png' width='450' height='450' class='img-fluid mb-4 mr-3'>
                                <h3><strong>Votre panier est vide</strong></h3>
                                <h4>Ajoutez quelque chose </h4>
                                <a href='objectifs.php' class='btn rounded-pill m-3' data-abc='true' style='background-color:#d6c900; font-size:20px; font-weight:600;'>Continue le shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    } else {
        $id = $_SESSION['id_user'];
        $sql = "INSERT INTO commande (date_cmd, id_user, note, total, livraison, paiement, statuscmd) VALUES (now(), '$id', '$note', '$total', '$liv', '$payment', 'en-attente')";
        $result = mysqli_query($con, $sql);
        $idrecp = mysqli_insert_id($con);

        $_SQL = "INSERT INTO etre_commande (id_plat, id_cmd, qte, jours) VALUES ";

        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $id = $values["item_id"];
            $days = isset($values["boxdays"]) ? $values["boxdays"] : ''; // Check if the key exists
            $quantity = isset($values["quantity"]) ? $values["quantity"] : ''; // Check if the key exists
            $_SQL .= "('$id', '$idrecp', '$days', '$quantity'),";
        }

        $_SQL = rtrim($_SQL, ",");
        $result1 = mysqli_query($con, $_SQL);
        unset($_SESSION["shopping_cart"]);
        echo "<div class='jumbotron text-center' style='height:600px'>
                <img src='./img/check.png' width='250' height='250' class='img-fluid mb-4 mr-3'>
                <h1 class='display-3'>Thank You!</h1>
                <p class='lead'><strong>Votre commande est maintenant terminée .</strong> Vous allez le recevoir dans 24 heures.</p>
                <hr>
                <p>Avoir des problèmes? <a href=''>Contactez-nous </a></p>
                <p class='lead'>
                    <a class='btn btn-sm rounded-pill' href='index.php' role='button' style='background-color:#d6c900;'>Continuer à la page d'accueil</a>
                </p>
            </div>";
    }
}
?>
