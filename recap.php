<?php
require "functions.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css"/>
   
    <title>Récapitulatif des produits</title>
</head>

<body>

    <nav>
        <a href="recap.php">
            <i class="fa-sharp fa-solid fa-cart-shopping"> </i>
            <?=totalQtt()?>
        </a>
        <a href="index.php">
            Accueil
        </a>
    </nav>

    <?php 
    
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) { // SI products[] n'existe pas, ou qu'il est vide, alors
    echo "<h1>Le panier est vide !</h1>";
    } else {
        echo "<table id='products_list'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th></th>",
                    "</tr>",
                "</thead>",
                "<tbody>";

        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product) { // Pour chaque product dans l'index du tableau products,
            echo "<tr>",
                        "<td>".$index."</td>",

                        "<td>".$product['name']."</td>",

                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    
                        "<td><a href='traitement.php?action=decreaseQtt&id=".$index."' class='change_qtt'>-</a>",
                        $product['qtt'],
                        "<a href='traitement.php?action=addQtt&id=".$index."' class='change_qtt'>+</a></td>",
                        
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",

                        "<td><a href='traitement.php?action=deleteProduct&id=".$index."'>
                            <i class='fa-solid fa-trash'></i>
                        </a></td>",
                         
                        "</tr>"  ;
                        $totalGeneral+= $product['total'];
        }
        echo "<tfoot>
            <tr>",
                "<td colspan=4>Nombre de produits : </td>",
                "<td><strong>" . totalQtt() . "</strong></td>",
            "</tr>",
        
            "<tr>",
                "<td colspan=4>Total du panier : </td>",
                "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
            "</tfoot></tbody>",

            "</tbody>",
            "</table>",

            "<a href='traitement.php?action=emptyBasket'>Vider le panier</a>";

    }


    ?>

</body>

</html>