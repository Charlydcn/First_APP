<?php

session_start();

if (isset($_POST['submit'])) { // On vérifie l'existence de la clé 'submit' dans le tableau $_POST 

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
}

header("Location:index.php"); // Si elle n'existe pas, on redirige vers l'index.php avec la fonction "header"
    // La fonction "header" ne doit pas être utilisé si la page a déjà émis un début de réponse (afficher du HTML, echo(), print(), ou autre header() sous
    // peine de perturber la réponse à émmettre au client), et elle doit impérativement être exécuter en dernier
