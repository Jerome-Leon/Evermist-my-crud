<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=carter-one:400|chelsea-market:400" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style_create.css">
    <title>Boréa-Nouveau personnage</title>
</head>

<body>
    <?php include 'src/View/templates/header.php'; ?>
    <h2>Création d'un personnage</h2>

    <form class="formUpdate" action="/characters/save" method="post">
        <div class="characterCard">
            <div class="topBanner"></div>
            <label class="text_portrait" for="portrait">Portrait</label>
            <div class="portraitArrow"></div>
            <div class="portraitContainer">
                <input type="hidden" id="selectedPortrait" name="portrait">
                <img class="characterPortrait" src="/assets/images/user.png" alt="Portrait" id="neutralPortrait">
            </div>
            <div class="nameContainer">
                <div class="nameArrow"></div>
                <label class="text_name" for="name">Nom</label>
                <div class="input-group">
                    <input class="input_name" type="text" id="name" name="name" autocomplete ="off" required>
                </div>
            </div>
            <div class="attackArrow"></div>
            <div class="attackZone">
                <div class="input-group">
                    <label class="text_attack" for="attack">Attaque</label>
                    <input class="input_int_attack" type="text" id="attack" name="attack" autocomplete="off" required>
                </div>
            </div>
            <div class="defenseArrow"></div>
            <div class="defenseZone">
                <div class="input-group">
                    <label class="text_defense" for="defense">Défense</label>
                    <input class="input_int_defense" type="text" id="defense" name="defense" required>
                </div>
            </div>
            <div class="hpZone">
                <div class="hpArrow"></div>
                <div class="input-group">
                    <label class="text_hp" for="hit_points">Santé</label>
                    <input class="input_hp" type="text" id="hit_points" name="hit_points" required>
                </div>
                <span>❤️</span>
                <div class="hpMaxArrow"></div>
                <div class="input-group">
                    <label class="text_hp_max" for="max_hit_points">Santé max</label>
                    <input class="input_hp" type="text" id="max_hit_points" name="max_hit_points" required>
                </div>
            </div>
            <div class="bottomBanner"></div>
        </div>
        <button type="submit">Créer Personnage</button>
        <div id="imageModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modalImage">
        </div>

    </form>

    <?php include 'src/View/templates/footer.php'; ?>
</body>

</html>