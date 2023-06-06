<?php 
    session_start();
    include 'db_conn.php';
    // on verifie si les champs login,mot de passe et confirmation existent
    if(isset($_POST['login']) && isset($_POST['password_1']) && 
    isset($_POST['password_2']))
    { 
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data =htmlspecialchars($data);
            return $data;
        }

        $login = validate($_POST['login']);
        $password = validate($_POST['password_1']);
        $confirmation = validate($_POST['password_2']);

        //si le champ login n'a pas ete rempli
        if(empty($login))
        {
            header("Location: etp1.php?error=Le login est obligatoire");
            exit();
        }
        
        //on verifie si le mot de passe a ete saisi
        else if(empty($password))
        {
            header("Location: etp1.php?error=le mot de passe est obligatoire");
            exit();
        }

        //on verfie s'il a confirme
        else if(empty($confirmation))
        {
            header("Location: etp1.php?error=la confirmation du mot de passe est obligatoire");
            exit();
        }
        
        //on verifie s'il a bien confirmé
        else if($password !== $confirmation)
        {
            header("Location: etp1.php?error=Erreur dans la confirmation");
            exit();
        }

        else
        {
           
            $DB_DSN = 'mysql:host=localhost;dbname=etudiant';
            $DB_USER = 'root';
            $DB_PASS = 'simon';
            try
            {
                $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
                        // on va hasher le mot de passe
                       $sql = 'INSERT INTO utilisateur (login,password) VALUES(:login,:password )';
                       $request = $PDO->prepare($sql);
                       $request ->execute([
                           'login' =>$login,
                           'password' =>$password
                       ]);
                       
            }
            

            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }
    
        }    
    }
    
    /*
    else{
        header("Location:../etape1/etp1.php");
        exit();
    }*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="CSS/admin.css">
   
</head>
<body>
    
    <div class="school">
        <div class="s1"><b>Ecole Supérieure</b></div>
        <div class="s2"><b>Polytechnique (E.S.P)</b></div>
    </div>

    <div class="cadre">
        <h1>Etape 1: Inscription Administratif</h1>
        <form method="post" action="peda.php">
        <fieldset>
            <h3>Identification</h3> 
            <?php if(isset($_GET['error1'])) {?>
                    <p class="error1"> <?php echo $_GET['error1'] ; ?></p>
                <?php } ?>
                <input  class="ina" type="text" name="Nom"  placeholder="Nom"  >
                <input  class="ina" type="text" name="Prenoms"  placeholder="Prénoms" >
                <br>
               
                <select class="ina" name="Civilite">
                    <option value="">Civilité</option>
                    <option value="M">M</option>
                    <option value="Mme">Mme</option>
                    <option value="Mlle">Mlle</option>
                   
                </select>
            
              
                <input  class="ina" type="text" name="Date_de_naissance"  placeholder="Date de naissance" >
                <input  class="ina" type="text" name="Lieu_de_naissance"  placeholder="Lieu de naissance">
                <input  class="ina" type="text" name="CNI"  placeholder="CNI" >
                <input  class="ina" type="text" name="INE"  placeholder="INE" >
                <input  class="ina" type="text" name="Numero_du_carte"  placeholder="Numero du carte" >
                <input  class="ina" type="text" name="Pays_de_naissance"  placeholder="Pays de naissance" >
                <input  class="ina" type="text" name="Nationalite"  placeholder="Nationalité" >  
          
        </fieldset>

        <fieldset>
            <h3>Adresse</h3> 
            <?php if(isset($_GET['error2'])) {?>
                        <p class="error2"> <?php echo $_GET['error2'] ; ?></p>
                    <?php } ?>
            <input  class="ina" type="text" name="Adresse_principal"  placeholder="Adresse principal" >
            <input  class="ina" type="text" name="Adresse_secondaire"  placeholder="Adresse secondaire" >
            <input  class="ina" type="text" name="Email"  placeholder="Email">
            <input  class="ina" type="text" name="Telephone_portable"  placeholder="Téléphone portable">
            <input  class="ina" type="text" name="Telephone_fixe"  placeholder="Téléphone fixe" >
            <input  class="ina" type="text" name="Email_personnel"  placeholder="Email personnel">
            <input  class="ina" type="text" name="Email_institutionnel"  placeholder="Email institutionnel">
            <input  class="ina" type="text" name="Boite_postal"  placeholder="Boite postal" >

        </fieldset>
        
        <fieldset>
            <h3>Situation familiale</h3> 
            <?php if(isset($_GET['error3'])) {?>
                    <p class="error3"> <?php echo $_GET['error3'] ; ?></p>
                <?php } ?>
                <select class="ina" name="Situation_matrimoniale" >
                    <option value="">Situation matrimoniale</option>
                    <option value="Marie">Marie</option>
                    <option value="Célibataire">Célibataire</option>
                    <option value="Veuf">Veuf</option>      
                </select>
          
            <input  class="ina" type="text" name="Nombre_enfant"  placeholder="Nombre d'enfants">
        </fieldset>

        <fieldset>
            <h3>Bourses</h3>
            <?php if(isset($_GET['error4'])) {?>
                    <p class="error4"> <?php echo $_GET['error4'] ; ?></p>
                <?php } ?>
            <div class="radio"  >
               <b>   Bourse:   </b> 
            <input  type="radio" name="bourse" value="Boursier" >Boursier
            <input  type="radio"  name="bourse" value="Nonboursier" >Non boursier
           </div>

           <div class="radio"  >
                <b>   Nature de la bourse :   </b>
            <input  type="radio" name="Nature_de_la_bourse" value="Nationale" >Nationale
            <input  type="radio"  name="Nature_de_la_bourse" value="Etranger" >Etranger
            <input  type="radio"  name="Nature_de_la_bourse" value="Etablissement" >Etablissement
           </div>
        
            <input  class="ina" type="text" name="Montant_de_la_bourse"  placeholder="Montant de la bourse" >
        </fieldset>
        <fieldset>
            <h3>Contact (Personne à contacter/Responsable)</h3>
            <?php if(isset($_GET['error5'])) {?>
                    <p class="error5"> <?php echo $_GET['error5'] ; ?></p>
                <?php } ?>
            <input  class="ina" type="text" name="nom"  placeholder="Nom" >
            <input  class="ina" type="text" name="prenoms"  placeholder="Prénoms" >
            <input  class="ina" type="text" name="Adresse"  placeholder="Adresse" >
            <input  class="ina" type="text" name="Ville"  placeholder="Ville" >
            <input  class="ina" type="text" name="Téléphone_portable"  placeholder="Téléphone portable" >
            <input  class="ina" type="text" name="Téléphone_fixe"  placeholder="Téléphone fixe" >
            <input  class="ina" type="text" name="Email_personnel"  placeholder="Email personnel" >
            <input  class="ina" type="text" name="Boite_postale"  placeholder="Boite postal">
            <input  class="ina" type="text" name="Fax"  placeholder="Fax">
            <input  class="ina" type="text" name="Responsable_etudiant"  placeholder="Responsable etudiant" >
            <input  class="ina" type="text" name="Personne_a_contacter"  placeholder="Personne à contacter">      
        </fieldset>
       
    
     <button  onclick="window.location.href='acceuil.php';">Annuler</button>
        <button type="submit">Valider</button>
         
   

    </form>
    </div>
    
    <img src="logo ucad.png" class="logo1">
    
    <ul class="RS_1">
        <li class="bulle"><a href="https://instagram.com/esp_dakar?"><img src="insta.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://twitter.com/esp_dakar"><img src="twitter.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://m.facebook.com/100068308804779"><img src="fb.png"  class="reseau" ></a></li>
        <li class="bulle"><a href="https://esp.sn"><img src="website.png"  class="reseau" ></a></li>
    </ul>
    
</body>
</html>