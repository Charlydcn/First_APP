<?php

require "functions.php";

$id = (isset($_GET['id'])) ? $_GET['id'] : null;



if (isset($_GET['action'])) {
    switch($_GET['action']){

        case "addProduct":

            $_SESSION['message'] = "Produit incorrect";

            if (isset($_POST['submit'])) { // On vérifie l'existence de la clé 'submit' dans le tableau $_POST

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                // filter_input() permet d'effectuer une validation/nettoyage de chaque donnée transmise par le formulaire via divers filtres:
                // SANITIZE_STRING : supprime tout caractères spéciaux/balises HTML/encode d'une chaîne de caractère
                // VALIDATE_FLOAT : n'accepte que la valeur si elle est de type float (pas de texte etc.)
                // FLAG_ALLOW_FRACTION : pour accepter l'utilisation de "," ou "." pour la décimale
                // VALIDATE_INT : n'accepte que les int

                // Le filter renvoie la valeur assainie en cas de succès, false si le filtre échoue ou null si le champ n'existe pas
                if ($price > 0 && $qtt > 0) {

                    if ($name && $price && $qtt) { // Donc si les trois variables sont jugées positives par PHP (pas "false" ou "null", mais bien une valeur texte/nombres etc.)
                        
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];

                        $_SESSION['products'][] = $product;
                    }
                    
                    $_SESSION['message'] = "Produit ajouté au panier";

                } 
            }

            header("Location:index.php"); // Si elle n'existe pas, on redirige vers l'index.php avec la fonction "header"
            // La fonction "header" ne doit pas être utilisé si la page a déjà émis un début de réponse (afficher du HTML, echo(), print(), ou autre header() sous
            // peine de perturber la réponse à émmettre au client), et elle doit impérativement être exécuter en dernier
            break;
        
        

        case "emptyBasket":
            delete($id);
            header("Location:recap.php");
            break;

        case "deleteProduct":
            delete($id);
            header("Location:recap.php");
            break;

        case "decreaseQtt";
            decreaseQtt($id);
            header("Location:recap.php");
            break;    

        case "addQtt";
            addQtt($id);
            header("Location:recap.php");
            break;    

    }
}