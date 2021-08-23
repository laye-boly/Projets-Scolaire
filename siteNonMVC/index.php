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
        require("dbconnect.php");

        $db = dbConnect();

        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM business ORDER BY date_creation DESC LIMIT 0, 5');

         while ($donnees = $req->fetch())
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
            <em><a href="view.php?id=<?php echo $donnees['id']; ?>"> 
          
            <!-- <em><a href="view/businessView.php?id=<?php //echo $donnees['id']; ?>"> -->
       Commentaires</a></em>


            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>