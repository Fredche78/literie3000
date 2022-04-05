<?php

$db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");
$query = $db->query("SELECT * FROM matelas");

$matelas = $query->fetchAll();

include("templates/header.php")
?>
<h1>Catalogue</h1>

<div class="presentation">
    <?php
    foreach ($matelas as $item) {
    ?>
        <div class="matelas">

            <div class="picture">
                <img src="assets/img/matelas/<?= $item['photo'] ?>" alt="<?= $item["marque"] . " " . $item["modele"] ?> ">
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

        </div>
    <?php
    }
    ?>
</div>

<?php
include("templates/footer.php")
?>