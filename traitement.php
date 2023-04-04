<?php
session_start();
require "functions.php";

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if (isset($_GET['action'])) {
    switch($_GET['action']){

        case "addProduct":

            $_SESSION['message'] = "Produit incorrect";

            if (isset($_POST['submit'])) { // On vérifie l'existence de la clé 'submit' dans le tableau $_POST

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


                    // //************************ IMAGE *********************************

                    if(isset($_FILES['img'])) {
                        $imgTmpName = $_FILES['img']['tmp_name'];
                        $imgName = $_FILES['img']['name'];
                        $imgSize = $_FILES['img']['size'];
                        $imgError = $_FILES['img']['error'];
    
                        $tabExtension = explode('.', $imgName);
                        $extension = strtolower(end($tabExtension));
    
                        //Tableau des extensions que l'on accepte
                        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                        $maxSize = 400000;
    
                        if(in_array($extension, $extensions) && $imgSize <= $maxSize && $imgError == 0){
                            $uniqueName = uniqid('', true); // uniqid génère un ID random (exemple 5f586bf96dcd38.73540086)
                            $img = $uniqueName.'.'.$extension;
                            move_uploaded_file($imgTmpName, './upload/'.$img);
                        }
                        else{
                            echo "Mauvaise extension ou image trop volumineuse";
                        }

                        

                    }

                    // //****************************************************************

                // Le filter renvoie la valeur assainie en cas de succès, false si le filtre échoue ou null si le champ n'existe pas
                if ($price > 0 && $qtt > 0) {

                    if ($name && $price && $qtt && $description) { // Donc si les trois variables sont jugées positives par PHP (pas "false" ou "null", mais bien une valeur texte/nombres etc.)
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "img" => $img,
                            "description" => $description,
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