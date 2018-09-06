<?php
//On inclut le fichier dont on a besoin (ici à la racine de notre site)
require 'Database.php';
//Ne pas oublier d'ajouter le fichier Article.php
require 'Article.php';
//Ne pas oublier d'ajouter le fichier Comment.php
require 'Comment.php';
?>

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
    $article = new Article();
    $article = $article->getArticle($_GET['idArt']);
    $data = $article->fetch()
    ?>
        <div>
            <h2><?= htmlspecialchars($data['title']);?></h2>
            <p><?= htmlspecialchars($data['content']);?></p>
            <p><?= htmlspecialchars($data['author']);?></p>
            <p>Créé le : <?= htmlspecialchars($data['date_added']);?></p>
        </div>
        <br>
    <?php
    $article->closeCursor();
    ?>
    <a href="home.php">Retour à la liste des articles</a>
    <div id="comments" class="text-left" style="margin-left: 50px">
        <h3>Commentaires</h3>
        <?php
        $comment = new Comment();
        $comments = $comment->getCommentsFromArticle($_GET['idArt']);
        while($datas = $comments->fetch())
        {
            ?>
            <h4><?= htmlspecialchars($datas['pseudo']);?></h4>
            <p><?= htmlspecialchars($datas['content']);?></p>
            <p>Posté le <?= htmlspecialchars($datas['date_added']);?></p>
            <?php
        }
        $comments->closeCursor();
        ?>
    </div>
</div>
</body>
</html>