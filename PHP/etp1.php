
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="CSS/etp1.css">
</head>
<body>
    <div class="school">
        <div class="s1"><b>Ecole Supérieure</b></div>
        <div class="s2"><b>Polytechnique (E.S.P)</b></div>
    </div>
    <img src="logo ucad.png" alt="" class="logo1">
    <div class="cadre">
        <div class="Inscription">
            <form action="admin.php" method="post">
                <h2>Inscription</h2>
                <?php if(isset($_GET['error'])) {?>
                    <p class="error"> <?php echo $_GET['error'] ; ?></p>
                <?php } ?>
                <div  class="div1">
                    <input name="login" type="email" >
                    <label for="">Login</label>
                </div>
                <div class="div1">
                    <input type="password" name="password_1" >
                    <label for=""> Password</label>
                </div>
                <div class="div1">
                    <input type="password" name="password_2" >
                    <label for=""> Confirmation</label>
                </div>
                <div>
                <input type="submit"  class="button 1" value="valider">
                <a class="button 2" href="acceuil.php">retour</a>
                </div>

              
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