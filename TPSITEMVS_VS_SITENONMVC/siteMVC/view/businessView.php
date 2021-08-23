<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Business en ligne</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Meilleurs business en ligne</h1>
        <p><a href="./index.php">Retour à la liste des business en ligne</a></p>

        <div class="news">
        
            <h3>
                
                <?= htmlspecialchars($business['titre']) ?>
                <em>le <?= $business['date_creation_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($business['contenu'])) ?>
            </p>
         
        </div>

        <h2>Commentaires</h2>
        
                 
        <?php
        
        
        while ($donnees = $commentaires->fetch())
        {
        ?>

            <p><strong><?= htmlspecialchars($donnees['auteur']) ?></strong> le <?= $donnees['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($donnees['contenu'])) ?></p>
        <?php
        }
        ?>

        <!-- ... -->

<h2>Commentaires</h2>

<form action="./index.php?action=ajoutCommentaire&amp;id=<?= $business['id'] ?>" method="post">
    <div>
        <label for="auteur">Auteur</label><br />
        <input type="text" id="auteur" name="auteur" />
    </div>
    <div>
        <label for="commentaire">Commentaire</label><br />
        <textarea id="commentaire" name="commentaire"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

       
    </body>
</html>