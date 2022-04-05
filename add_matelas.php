<?php


if (!empty($_POST)) {
    //Le formulaire a été envoyé
    // var_dump($_POST);

    //Utilisation de la fonction strip_tags pour supprimer d'éventuelles balises HTML qui se seraient glissées dan le champ de saisi (et surtout une possible balise script)
    //Ulilisation de la fonction trim pour supprimer d'éventuels espaces en début et en fin de chaine
    $marque = trim(strip_tags($_POST["marque"]));
    $modele = trim(strip_tags($_POST["modele"]));
    $dimension = trim(strip_tags($_POST["dimension"]));
    $prix = trim(strip_tags($_POST["prix"]));
    $prix_promo = trim(strip_tags($_POST["prix_promo"]));
    $photo = trim(strip_tags($_POST["photo"]));

    $errors = [];

    if (empty($modele)) {
        $errors["modele"] = " Le modele est obligatoire ";
    }

    if (empty($prix)) {
        $errors["prix"] = " Le prix doit-être renseigné ";
    }

    if (empty($prix_promo)) {
        $errors["prix_promo"] = " Le prix promotionnel doit-être renseigné ";
    }

    if (!filter_var($photo, FILTER_VALIDATE_URL)) {
        $errors["photo"] = " L'url de la photo est invalide ! ";
    }

    // Ici on teste si le formulaire est validé autrement dit sans erreur
    if (empty($errors)) {
        // REquête d'insertion en base de donnée
        $dsn = "mysql:host=localhost;dbname=literie3000; charset=utf8mb4";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO matelas
        (marque, modele, dimension, prix, prix_promo, photo)
        VALUES
        (:marque, :modele, :dimension, :prix, :prix_promo, :photo)
        ");
        // On associe une variable à chaque paramètre de la requète préparée avec la méthode bindParam
        $query->bindParam("marque", $marque);
        $query->bindParam("modele", $modele);
        $query->bindParam("dimension", $dimension);
        $query->bindParam("prix", $prix);
        $query->bindParam("prix_promo", $prix_promo);
        $query->bindParam("photo", $photo);
        // Si l'exécution de la requète se passe bien, la méthode exécute nous donne un booléen à vrai, danc ce cas  nous redirigeons l'utilisateur vers la page d'accueil.
        if ($query->execute()) {
            header("Location: index.php");
        }

    
    }
}


include("templates/header.php");
?>
<h1>Ajouter un matelas</h1>

<div class="formulaire">

    <form action="" method="post">

    <div class="form-group">
        <label for="selectMarque">Marque :</label>
        <select name="marque" id="selectMarque">
            <option value="Epeda" <?= (isset($marque) && $marque === "Epeda") ? "selected" : "" ?>>Epeda</option>
            <option value="Dreamway" <?= (isset($marque) && $marque === "Dreamway") ? "selected" : "" ?>>Dreamway</option>
            <option value="Bultex" <?= (isset($marque) && $marque === "Bultex") ? "selected" : "" ?>>Bultex</option>
            <option value="Dorsoline" <?= (isset($marque) && $marque === "Dorsoline") ? "selected" : "" ?>>Dorsoline</option>
            <option value="MemoryLine" <?= (isset($marque) && $marque === "MemoryLine") ? "selected" : "" ?>>MemoryLine</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inputModele">Modèle: </label>
        <input id="inputModele" name="modele" type="text" value="<?= isset($modele) ? $modele : "" ?>">
    </div>

    <div class="form-group">
        <label for="selectDimension">Dimensions :</label>
        <select name="dimension" id="selectDimension">
            <option value="190x90" <?= (isset($dimension) && $dimension === "190x90") ? "selected" : "" ?>>190x90</option>
            <option value="190x140" <?= (isset($dimension) && $dimension === "190x140") ? "selected" : "" ?>>190x140</option>
            <option value="200x160" <?= (isset($dimension) && $dimension === "200x160") ? "selected" : "" ?>>200x160</option>
            <option value="200x180" <?= (isset($dimension) && $dimension === "200x180") ? "selected" : "" ?>>200x180</option>
            <option value="200x200" <?= (isset($dimension) && $dimension === "200x200") ? "selected" : "" ?>>200x200</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inputPrix">Prix: </label>
        <input id="inputPrix" name="prix" type="text" value="<?= isset($prix) ? $prix : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputPrixPromo">Prix promotionnel: </label>
        <input id="inputPrixPromo" name="prix_promo" type="text" value="<?= isset($prix_promo) ? $prix_promo : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputPhoto">URL de la photo :</label>
        <input id="inputPhoto" name="photo" type="text" value="<?= isset($photo) ? $photo : "" ?>">
    </div>

    <input class="btn-matelas" type="submit" value="Ajouter le produit">

    </form>
</div>

<div class="error">
    <?php
        if (isset($errors["modele"])) {
        ?>
            <p><span class="info-error"><?= $errors["modele"] ?></span></p>
        <?php
        }
        ?>

        <?php
        if (isset($errors["prix"])) {
        ?>
            <p><span class="info-error"><?= $errors["prix"] ?></span></p>
        <?php
        }
        ?>

        <?php
        if (isset($errors["prix_promo"])) {
        ?>
            <p><span class="info-error"><?= $errors["prix_promo"] ?></span></p>
        <?php
        }
        ?>

        <?php
        if (isset($errors["photo"])) {
        ?>
            <p><span class="info-error"><?= $errors["photo"] ?></span></p>
        <?php
        }
        ?>
    </div>



<?php
include("templates/footer.php");
?>