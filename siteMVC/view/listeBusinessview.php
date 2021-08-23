<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Business en ligne</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>La liste des meilleurs business en ligne</h1>
    
 
        
        <?php
        while ($donnees = $businesss->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <em><a href="./index.php?action=business&id=<?php echo $donnees['id']; ?>"> 
          
            <!-- <em><a href="view/businessView.php?id=<?php //echo $donnees['id']; ?>"> -->
       Commentaires</a></em>


            </p>
        </div>
        <?php
        }
        $businesss->closeCursor();
        ?>
    </body>
</html>