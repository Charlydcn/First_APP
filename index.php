<?php
    session_start();
    ob_start();
?>

<h1>Ajouter un produit</h1>
<form action="traitement.php?action=addProduct" method="post" autocomplete="off">
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

<?php
    $content = ob_get_clean();
    $title = "Accueil";
    require 'template.php';
?>

</body>