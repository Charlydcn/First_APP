<?php
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style> <?php include 'CSS/style.css'; ?> </style>
    <title>Ajout produit</title>
</head>
<body>
    
    <nav>
        <a href="recap.php">
            <i class="fa-sharp fa-solid fa-cart-shopping"> </i>
            <?=totalQtt()?>
        </a>
        <a href="index.php">
            Ajout d'un produit
        </a>
    </nav>

    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post" autocomplete="off">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name" required>
            </label>
            <br>                
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price" required>
            </label>
            <br>
        </p>
        <p>
            <label>
                Quantité :
                <input type="number" name="qtt" required>
            </label>
            <br>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>

</body>
</html>