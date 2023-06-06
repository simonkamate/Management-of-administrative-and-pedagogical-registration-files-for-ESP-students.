<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="CSS/connecter.css">
</head>
<body>
    <div class="school">
        <div class="s1"><b>Ecole Supérieure</b></div>
        <div class="s2"><b>Polytechnique (E.S.P)</b></div>
    </div>
    <img src="logo ucad.png" alt="" class="logo1">
    <div class="cadre">
        <div class="authentifaction">
            <form method="post" action="login.php">
                <h2>Authentifaction</h2>
                <?php if(isset($_GET['error'])) {?>
                    <p class="error"> <?php echo $_GET['error'] ; ?></p>
                <?php } ?>
                <div class="div1">
                    <input type="text" name="login">
                    <label for="">Login</label>
                </div>
                <div class="div1">
                    <input type="password" name="password">
                    <label for=""> Password</label>
                </div>
                
                <button type="submit">Connexion</button>
                

                <a href="acceuil.php" class="acceuil">retour</a>
            </form>
        </div>
    </div>
    <ul class="RS_1">
        <li class="bulle"><a href="https://instagram.com/esp_dakar?"><img src="insta.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://twitter.com/esp_dakar"><img src="twitter.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://m.facebook.com/100068308804779"><img src="fb.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://esp.sn"><img src="website.png"  class="reseau" ></a></li>
    </ul>
    
  
</body>
</html>