<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=carter-one:400|chelsea-market:400" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Liste des personnages</title>
</head>

<body class="cards">
    <?php include 'src/View/templates/header.php'; ?>
    <h2>Les cartes de personnages</h2>
    <ul class="cardsContainer">
        <?php foreach ($characters as $character): ?>
            <div class="characterCard">
                <div class="topBanner"></div>
                <div class="portraitContainer">
                    <img src="<?= $character['portrait'] ?>" alt="<?= $character['name'] ?>" class="characterPortrait">
                </div>
                <div class="nameContainer">
                    <li><?= $character['name'] ?></li>
                </div>
                <div class="attackLabel"></div>
                <div class="attackZone">
                    <li><?= $character['attack'] ?></li>
                </div>
                <div class="defenseLabel"></div>
                <div class="defenseZone">
                    <li><?= $character['defense'] ?></li>
                </div>
                <div class="buttonsZone">
                    <li><a class="editButton" href="/characters/edit/<?= $character['id'] ?>"></a>
                    <a class="deleteButton" href="/characters/delete/<?= $character['id'] ?>"></a></li>
                </div>
                <div class="hpZone">
                    <li>❤️ <?= $character['hit_points'] ?>/<?= $character['max_hit_points'] ?></li>
                </div>
                <div class="bottomBanner"></div>
                <div class="bottomBannerEdit"></div>
                <div class="bottomBannerDelete"></div>
            </div>
        <?php endforeach; ?>
    </ul>

    <?php include 'src/View/templates/footer.php'; ?>
</body>

</html>