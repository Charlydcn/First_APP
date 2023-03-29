<?php require_once 'functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>Store - Product | <?= $title ?> </title>
</head>
<body>
    <header>

        <nav>
            <a href="recap.php">
                <i class="fa-sharp fa-solid fa-cart-shopping"> </i>
                <?=totalQtt()?>
            </a>
            <a href="index.php">
                Accueil
            </a>
        </nav>

        <?=getMessages()?>

    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
    </footer>


</body>
</html>