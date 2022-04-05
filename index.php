<?php

$db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");
$query = $db->query("SELECT * FROM matelas");

$matelas = $query->fetchAll();

if (!empty($_POST)) {

    $delete = trim(strip_tags($_POST["delete"]));
    $query = $db->prepare("DELETE FROM matelas WHERE id= :delete");
    $query->bindParam(":delete", $delete);

    // if ($_GET["id"] === $item["id"]) {
    ($query->execute());
    // header("index.php");
}

include("templates/header.php")
?>
<h1>Catalogue</h1>

<div class="presentation">
    <?php
    foreach ($matelas as $item) {
    ?>
        <div class="matelas">

            <div class="picture">
                <img src="<?= $item['photo'] ?>" alt="<?= $item["marque"] . " " . $item["modele"] ?> ">
            </div>
            <div class="marque">
                <?= $item["marque"] ?>
            </div>
            <div class="type">
                <p>Matelas</p>
                <p><?= $item["modele"] ?></p>
                <p><?= $item["dimension"] ?></p>
            </div>
            <div class="price">
                <p id="promo"><?= $item["prix"] ?> €</p>
                <p><?= $item["prix_promo"] ?> €</p>
            </div>
            <div class="idProd">
                <p>ID: <?= $item["id"] ?></p>
                <p </p>
            </div>

            <!-- <div class="suppression">
                <form action="" method="post">   
                    <input class="btn-supprimer" name="delete" type="submit" value="Supprimer">
                    <input type="text" name="delete" id="inputDelete" value="<?= isset($delete) ? $delete : "" ?>">
                </form>
                <a href="index.php?id="<?= $item["id"] ?>">Supprimer</a>
            </div> -->

            <!-- <input class="btn-supprimer" name="<?= $item["id"] ?>" type="submit" value="Supprimer"> -->

        </div>
    <?php
    }
    ?>

    <div class="suppression">
        <form action="index.php" method="post">   
            <label for="inputDelete">Tapez l'ID du produit pour le supprimer</label>
            <input type="text" name="delete" id="inputDelete" value="<?= isset($delete) ? $delete : "" ?>">
        </form>
    </div>
</div>



<div class="ajout">
    <a href="add_matelas.php">
        <button id="btn-ajout">Ajouter un produit</button>
    </a>
</div>

<?php
include("templates/footer.php")
?>