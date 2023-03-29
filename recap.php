<?php


    session_start();
    ob_start();

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) { // SI products[] n'existe pas, ou qu'il est vide, alors
        echo "<h1>Le panier est vide !</h1>";
    } else {
        echo "<table id='products_list'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>";

        $totalGeneral = 0;
        $totalProducts = 0;

        foreach($_SESSION['products'] as $index => $product) { // Pour chaque product dans l'index du tableau products,
            $totalProducts += $product["qtt"];
            echo "<tbody>
                    <tr>",
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
        
        echo "</tbody><tfoot>
            <tr>",
                "<td colspan=4>Nombre de produits : </td>",
                "<td><strong>".$totalProducts."</strong></td>",
            "</tr>",
        
            "<tr>",
                "<td colspan=4>Total du panier : </td>",
                "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
            "</tfoot>",
            "</table>",

            "<a href='traitement.php?action=emptyBasket'>Vider le panier</a>";
    }

    $content = ob_get_clean();
    $title = "Panier";
    require 'template.php';

?>