<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=carter-one:400|chelsea-market:400" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style_create.css">
    <title>Nouveau personnage</title>
</head>

<body>
    <?php include 'src/View/templates/header.php'; ?>
    <h2>Création d'un personnage</h2>

    <form class="formUpdate" action="/characters/save" method="post">
        <div class="characterCard">
            <div class="topBanner"></div>
            <div class="input-group">
                <label class="text" for="portrait">Portrait : </label>
                <input class="input" type="text" id="portrait" name="portrait" autocomplete="off" required>
            </div>
            <div class="input-group">
                <label class="text" for="name">Nom : </label>
                <input class="input" type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label class="text" for="attack">Attaque : </label>
                <input class="input" type="text" id="attack" name="attack" required>
            </div>
            <div class="input-group">
                <label class="text" for="defense">Défense : </label>
                <input class="input" type="text" id="defense" name="defense" required>
            </div>
            <div class="input-group">
                <label class="text" for="hit_points">HP : </label>
                <input class="input" type="text" id="hit_points" name="hit_points" required>
            </div>
            <div class="input-group">
                <label class="text" for="max_hit_points">HP Max: </label>
                <input class="input" type="text" id="max_hit_points" name="max_hit_points" required>
            </div>
        </div>
        <button type="submit">Créer Personnage</button>

    </form>

    <?php include 'src/View/templates/footer.php'; ?>
</body>

</html>