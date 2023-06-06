<?php 
    session_start();
    
    if (isset($_SESSION['login']) && isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/profil.css"/>
</head>
<body>
  
    <div class="school">
        <div class="s1"><b>Ecole Supérieure</b></div>
        <div class="s2"><b>Polytechnique (E.S.P)</b></div>
    </div>

    
    <img src="logo ucad.png" class="logo1">
    
    <ul class="RS_1">
        <li class="bulle"><a href="https://instagram.com/esp_dakar?"><img src="insta.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://twitter.com/esp_dakar"><img src="twitter.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://m.facebook.com/100068308804779"><img src="fb.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://esp.sn"><img src="website.png"  class="reseau" ></a></li>
    </ul>
   
    <main>
       <header>
                <div class="photo">
                    <img src="IMG.PNG" width="100%" height="100%" alt="">
                </div>
              <div class="des">
                    <h3><?php echo $_SESSION['Prenom'].' '.$_SESSION['Nom'] ; ?></h3>
         
                </div>
                
       </header>


<!-- <section class="section-left"> -->
    <h2 class="post"> DONNEES ADMINISTRATIVES</h2>
    
    <h4> Identification</h4>
    <hr class="light">
     <div class="div">
     
       <div>Nom: <?php  echo $_SESSION['Nom']; ?></div>
       <div>Prenom: <?php echo $_SESSION['Prenom'] ; ?></div>
       <div>Civilité: <?php echo $_SESSION['Civilite'] ;  ?></div>
       <div>Date de naissance: <?php echo $_SESSION['Date_de_naissance'] ; ?></div>
       <div>Lieu de naissance: <?php echo $_SESSION['Lieu_de_naissance']; ?></div>
       <div>CNI: <?php echo $_SESSION['CNI']; ?></div>
       <div>INE: <?php echo $_SESSION['INE']; ?></div>
       <div>Numéro carte: <?php echo $_SESSION['numero_carte']; ?></div>
       <div>Pays de naissance: <?php echo $_SESSION['Pays_de_naissance'];  ?></div>
       <div>Nationalité: <?php echo $_SESSION['Nationalite']; ?></div>
     </div>
     <br>
     <h4> Adresse</h4>
    <hr class="light">
       <div class="div">
           <div><b>Adresse principale : <?php echo $_SESSION['Adresse_principale']; ?></b></div>
           <div><b>Adresse secondaire :  <?php echo  $_SESSION['Adresse_secondaire']; ?></b></div>
           <div><b>Email : <?php echo $_SESSION['Email']; ?>:</b></div>
           <div><b>Téléphone portable : <?php echo $_SESSION['Telephone_portable']; ?></b></div>
           <div><b>Téléphone fixe : <?php echo $_SESSION['Telephone_fixe']; ?></b></div>
           <div><b>Email personnel : <?php  echo $_SESSION['Email_personnel']; ?></b></div>
           <div><b>Email institutionnel : <?php echo $_SESSION['Email_institutionnel'] ;?></b></div>
           <div><b>Boite postal : <?php echo $_SESSION['Boite_postale']; ?></b></div>
           
       </div>
       <br>
      
       
    <h4> Situation familiale</h4>
     <hr class="light">
        <div class="div">
            <div><b>Situation matrimoniale :  <?php echo $_SESSION['Situation_matriomoniale'] ; ?></b></div>
            <div><b>Nombre d’enfants : <?php echo $_SESSION['Nombre_enfants']; ?></b></div>
        </div>
        <br>
        <h4> Bourses</h4>
     <hr class="light">
        <div class="div">
            <div><b>Bourse : <?php echo $_SESSION['Bourse'] ; ?></b></div>
            <div><b>Nature de la bourse :  <?php echo $_SESSION['Nature_de_la_bourse']; ?></b></div>
            <div><b>Montant de la bourse : <?php echo $_SESSION['Montant_de_la_bourse']; ?></b></div>
        </div>
<br>
        <h4> Contact (Personne à contacter/Responsable)</h4>
    <hr class="light">
     <div class="div">
       <div> Nom: <?php echo $_SESSION['nom'] ; ?> </div>
       <div> Prénoms: <?php echo $_SESSION['prenom'];  ?> </div>
       <div>Adresse: <?php  echo $_SESSION['Adresse']; ?> </div>
       <div>Ville: <?php  echo $_SESSION['Ville']; ?> </div>
       <div>Téléphone portable: <?php echo $_SESSION['telephone_portable'] ;?> </div>
       <div>Téléphone fixe : <?php  echo $_SESSION['telephone_fixe']; ?> </div>
       <div>Email personnel : <?php  echo $_SESSION['email_personnel']; ?> </div>
       <div>Boite postale : <?php echo $_SESSION['boite_postale']; ?> </div>
       <div>Fax: <?php echo $_SESSION['Fax']; ?> </div>
       <div>Responsable étudiant : <?php echo $_SESSION['Responsable_etudiant']; ?> </div>
       <div>Personne à contacter : <?php echo $_SESSION['Personne_a_contacter'] ; ?> </div>
     <?php  ?> </div>
<br>
     <h2 class="post"> DONNEES PEDAGOGIQUES</h2>
     
     <div class="div">
       
        <div> Département :<?php echo $_SESSION['departement']; ?> </div>
        <div> Cyle :<?php echo $_SESSION['cycle']; ?> </div>
        <div> Niveau :<?php echo $_SESSION['niveau']; ?> </div>
        <div> Filière :<?php echo $_SESSION['filiere']; ?> </div>
        <div> Annee d'inscription :<?php echo $_SESSION['annee_Inscription']; ?> </div>
        <div> Etat d'inscription :<?php echo $_SESSION['Etat_inscription'] ; ?> </div>
         
     </div>
     <button onclick="window.location.href='deconnecter.php';" type="submit">Quitter</button>
    </main>
</body>

</html>

<?php
    }
    else
    {
        header("Location: connecter.php");
    }
?>