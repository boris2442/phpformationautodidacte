<nav>
        <h1>titre</h1>
        <ul>
            <li>Accueil</li>
            <li>Contact</li>
            <?php
            if(!isset($_SESSION["user"])):?>
                <li><a href="/inscriptions.php"></a></li>
                <li><a href="/connexion.php"></a></li>
        
         <php else:?>
            <li><a href="/deconnexion.php"></a></li>
          <?php endif;?>
           </ul>
    </nav>