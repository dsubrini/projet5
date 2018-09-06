<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>
        <?php
        while($data = $articles->fetch())
        {
        ?>
        <div>
            <h2><a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($data['id']);?>"><?= htmlspecialchars($data['title']);?></a></h2>
            <p><?= htmlspecialchars($data['content']);?></p>
            <p><?= htmlspecialchars($data['author']);?></p>
            <p>Créé le : <?= htmlspecialchars($data['date_added']);?></p>
        </div>
        <br>
        <?php
        }
        $articles->closeCursor();
        ?>
    </div>
</body>
</html>