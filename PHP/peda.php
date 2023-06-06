<?php
    session_start();
    include'db_conn.php';

   
    if(isset($_POST['Nom']) && isset($_POST['Prenoms'])
    && isset($_POST['Civilite']) && isset($_POST['Date_de_naissance'])
    && isset($_POST['Lieu_de_naissance']) && isset($_POST['CNI'])
    && isset($_POST['INE']) &&isset($_POST['Numero_du_carte']) && isset($_POST['Pays_de_naissance'])
    && isset($_POST['Nationalite']))
    {

        
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenoms'];
        $civilite = $_POST['Civilite'];
        $dateNaissance = $_POST['Date_de_naissance'];
        $LieuNaissance = $_POST['Lieu_de_naissance'];
        $CNI = $_POST['CNI'];
        $INE = $_POST['INE'];
        $numeroCarte = $_POST['Numero_du_carte'];
        $PaysNaissance = $_POST['Pays_de_naissance'];
        $Nationalite = $_POST['Nationalite'];

        if(empty($Nom))
        {
            header("Location: admin.php?error1=Le nom est obligatoire");
            exit();
        }
        
        //on verifie si le nom a ete saisi
        else if(empty($Prenom))
        {
            header("Location: admin.php?error1=le prenom est obligatoire");
            exit();
        }

        
        else if(empty($civilite))
        {
            header("Location: admin.php?error1=la civilié est obligatoire");
            exit();
        }


        else if(empty($dateNaissance))
        {
            header("Location: admin.php?error1=la date de naissance est obligatoire");
            exit();
        }

        else if(empty($LieuNaissance))
        {
            header("Location: admin.php?error1=le lieu de naissance est obligatoire");
            exit();
        }

        else if(empty($CNI))
        {
            header("Location: admin.php?error1=le CNI est obligatoire");
            exit();
        }

        else if(empty($numeroCarte))
        {
            header("Location: admin.php?error1=le numero de carte est obligatoire");
            exit();
        }

        else if(empty($PaysNaissance))
        {
            header("Location: admin.php?error1=le pays de naissance est obligatoire");
            exit();
        }

        else if(empty($Nationalite))
        {
            header("Location: admin.php?error1=le nationalité est obligatoire");
            exit();
        }

        
        else
        {
            
            try
            {
                $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
                        // on va hasher le mot de passe
                       $sql = 'INSERT INTO identification (Nom,Prenom,Civilite,Date_de_naissance,Lieu_de_naissance,CNI,INE,numero_carte,Pays_de_naissance,Nationalite) VALUES (:Nom, :Prenom, :Civilite, :Date_de_naissance, :Lieu_de_naissance, :CNI, :INE, :numero_carte, :Pays_de_naissance ,:Nationalite)';
                       $request = $PDO->prepare($sql);
                       $request ->execute([
                           'Nom' =>$Nom,
                           'Prenom' =>$Prenom,
                           'Civilite' =>$civilite,
                           'Date_de_naissance' =>$dateNaissance,
                           'Lieu_de_naissance' =>$LieuNaissance,
                           'CNI' =>$CNI,
                           'INE' =>$INE,
                           'numero_carte' =>$numeroCarte,
                           'Pays_de_naissance' =>$PaysNaissance,
                           'Nationalite' =>$Nationalite   
                       ]);
                           
            }


            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }
        }
        
    }



    if(isset($_POST['Adresse_principal']) && isset($_POST['Adresse_secondaire'])
    && isset($_POST['Email']) && isset($_POST['Telephone_portable'])
    && isset($_POST['Telephone_fixe']) && isset($_POST['Email_personnel'])
    && isset($_POST['Email_institutionnel']) && isset($_POST['Boite_postal']))
    {
        $adressePrincipal = $_POST['Adresse_principal'];
        $adresseSecondaire= $_POST['Adresse_secondaire'];
        $Email = $_POST['Email'];
        $TelephonePortable= $_POST['Telephone_portable'];
        $TelephoneFixe = $_POST['Telephone_fixe'];
        $EmailPersonne = $_POST['Email_personnel'];
        $EmailInstitutionnel = $_POST['Email_institutionnel'];
        $BoitePostal = $_POST['Boite_postal'];

        if(empty($BoitePostal))
        {
            $BoitePostal = NULL;
        }

        if(empty($adressePrincipal))
        {
            header("Location: admin.php?error2=L'adresse Principale est obligatoire");
            exit();
        }
        
        //on verifie si le nom a ete saisi
        else if(empty($adresseSecondaire))
        {
            header("Location: admin.php?error2=l'adresse Secondaire est obligatoire");
            exit();
        }

        
        else if(empty($Email))
        {
            header("Location: admin.php?error2=l'Email obligatoire");
            exit();
        }


        else if(empty($TelephonePortable))
        {
            header("Location: admin.php?error2=le telephone Portable est est obligatoire");
            exit();
        }

        else if(empty($TelephoneFixe))
        {
            header("Location: admin.php?error2=le telephone fixe est obligatoire");
            exit();
        }

        else if(empty($EmailPersonne))
        {
            header("Location: admin.php?error2=l' Email personne est obligatoire");
            exit();
        }

        else if(empty($EmailInstitutionnel))
        {
            header("Location: admin.php?error2=l'Email institutionnel est obligatoire");
            exit();
        }




        else
        {
            try
            {
                $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
                        // on va hasher le mot de passe
                       $sql2 = 'INSERT INTO adresse (Adresse_principale,Adresse_secondaire,
                       Email,Telephone_portable,Telephone_fixe,Email_personnel,Email_institutionnel, Boite_postale) VALUES (:Adresse_principale, :Adresse_secondaire, :Email, :Telephone_portable, :Telephone_fixe, :Email_personnel, :Email_institutionnel, :Boite_postale)';
                       $request2 = $PDO->prepare($sql2);
                       $request2 ->execute([
                           'Adresse_principale' =>$adressePrincipal,
                           'Adresse_secondaire' =>$adresseSecondaire,
                           'Email' =>$Email,
                           'Telephone_portable' =>$TelephonePortable,
                           'Telephone_fixe' =>$TelephoneFixe,
                           'Email_personnel' =>$EmailPersonne,
                           'Email_institutionnel' =>$EmailInstitutionnel,
                           'Boite_postale' =>$BoitePostal  
                       ]);
                
                           
            }


            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }

        }

        
        
    }



    if(isset($_POST['Situation_matrimoniale']) && isset($_POST['Nombre_enfant']))
    {
        $SituationMatrimonial = $_POST['Situation_matrimoniale'];
        $NombreEnfants = $_POST['Nombre_enfant'];
       
        if(empty($NombreEnfants))
        {
            $NombreEnfants = NULL;
        }
    
        if(empty($SituationMatrimonial))
        {
            header("Location: admin.php?error3=La situation matrimoniale est obligatoire");
            exit();
        }

        else
        {
            try
            {
                $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
                $sql3 = 'INSERT INTO situation_familiale (Situation_matriomoniale,Nombre_enfants) VALUES (:Situation_matriomoniale,:Nombre_enfants)';
                $request3 = $PDO->prepare($sql3);
                $request3 ->execute([
                    'Situation_matriomoniale' =>$SituationMatrimonial,
                    'Nombre_enfants' =>$NombreEnfants         
                ]);
                
                            
            }

            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }
        }
    
    

    }

        if(isset($_POST['bourse']) && isset($_POST['Nature_de_la_bourse'])
        && isset($_POST['Montant_de_la_bourse']))
        {
            $bourse = $_POST['bourse'];
            $natureBourse = $_POST['Nature_de_la_bourse'];
            $montant = $_POST['Montant_de_la_bourse'];
            
            if(empty($bourse))
            {
                header("Location: admin.php?error4=La bourse est obligatoire");
                exit();
            }
            
            if(empty($montant))
            {
                $montant = NULL; 
            }

            
            if(empty($natureBourse))
            {
                $natureBourse = NULL;
            }


            
            try
            {

                $sql4 = 'INSERT INTO  bourses (Bourse,Nature_de_la_bourse,Montant_de_la_bourse) VALUES (:Bourse, :Nature_de_la_bourse, :Montant_de_la_bourse)';
                $request4 = $PDO->prepare($sql4);
                $request4->execute([
                    'Bourse' => $bourse,
                    'Nature_de_la_bourse' => $natureBourse,
                    'Montant_de_la_bourse' => $montant
                ]);
                
                            
            }
    
            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }

            

        }

        if(isset($_POST['nom']) && isset($_POST['prenoms']) && isset($_POST['Adresse']) &&
          isset($_POST['Ville']) && isset($_POST['Telephone_portable']) && isset($_POST['Telephone_fixe']) && isset($_POST['Email_personnel'])
          && isset($_POST['Boite_postale']) && isset($_POST['Fax']) && isset($_POST['Responsable_etudiant'])
          && isset($_POST['Personne_a_contacter']))
          {
            $nom = $_POST['nom'];
            $prenoms = $_POST['prenoms'];
            $Adresse = $_POST['Adresse'];
            $ville = $_POST['Ville'];
            $TelephonePortable = $_POST['Telephone_portable'];
            $TelephoneFixe = $_POST['Telephone_fixe'];
            $EmailPersonnel = $_POST['Email_personnel'];
            $BoitePostale = $_POST['Boite_postale'];
            $Fax = $_POST['Fax'];
            $ResponsableEtudiant = $_POST['Responsable_etudiant'];
            $PersonneContacter = $_POST['Personne_a_contacter'];

        if(empty($BoitePostale))
        {
            $BoitePostale = NULL;
        }


        if(empty($adressePrincipal))
        {
            header("Location: admin.php?error5=L'adresse Principale est obligatoire");
            exit();
        }
        
        //on verifie si le nom a ete saisi
        else if(empty($nom))
        {
            header("Location: admin.php?error5=le nom est obligatoire");
            exit();
        }

        
        else if(empty($prenoms))
        {
            header("Location: admin.php?error5=le prenom est obligatoire");
            exit();
        }


        else if(empty($Adresse))
        {
            header("Location: admin.php?error5=l'adresse est obligatoire");
            exit();
        }

        else if(empty($ville))
        {
            header("Location: admin.php?error5=la ville est obligatoire");
            exit();
        }

        else if(empty($TelephonePortable))
        {
            header("Location: admin.php?error5=le telephone portable est obligatoire");
            exit();
        }

        else if(empty($TelephoneFixe))
        {
            header("Location: admin.php?error5=le telephone fixe est obligatoire");
            exit();
        }

        else if(empty($EmailPersonnel))
        {
            header("Location: admin.php?error5=l'Email institutionnel est obligatoire");
            exit();
        }

        else if(empty($Fax))
        {
            header("Location: admin.php?error5=Fax est obligatoire");
            exit();
        }

        else if(empty($ResponsableEtudiant))
        {
            header("Location: admin.php?error5=le responsable d'etudiant est obligatoire");
            exit();
        }
        else if(empty($PersonneContacter))
        {
            header("Location: admin.php?error5=la personne a contacter est obligatoire");
            exit();
        }



        else
        {
            $sql5 = 'INSERT INTO  contact (Nom,Prenom,Adresse,Ville,Telephone_portable,
            Telephone_fixe,Email_personnel,Boite_postale,Fax,Responsable_etudiant,Personne_a_contacter) 
            VALUES (:Nom, :Prenom, :Adresse, :Ville, :Telephone_portable, :Telephone_fixe
            , :Email_personnel, :Boite_postale, :Fax, :Responsable_etudiant, :Personne_a_contacter)'; 
            $request5 = $PDO->prepare($sql5);
            $request5->execute([
                'Nom' => $nom,
                'Prenom' => $prenoms,
                'Adresse' => $Adresse,
                'Ville' => $ville,
                'Telephone_portable' => $TelephonePortable,
                'Telephone_fixe' => $TelephoneFixe,
                'Email_personnel' => $EmailPersonnel,
                'Boite_postale' => $BoitePostale,
                'Fax' => $Fax,
                'Responsable_etudiant' => $ResponsableEtudiant,
                'Personne_a_contacter' => $PersonneContacter
            ]); 

            
        }
    }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogique</title>
    <link rel="stylesheet" href="CSS/peda.css">
   
</head>
<body>
    <div    class="style1">
    </div>
    <div class="school">
        <div class="s1"><b>Ecole Supérieure</b></div>
        <div class="s2"><b>Polytechnique (E.S.P)</b></div>
    </div>

    

    <div class="cadre">
        <h1>Etape 2: Inscription Pedagogique</h1>
        <form method="post" action="success.php">
            <fieldset>
                <h3>Département</h3>
                <?php if(isset($_GET['success'])) {?>
                    <p class="success"> <?php echo $_GET['success'] ; ?></p>
                <?php } ?>

                <?php if(isset($_GET['error1'])) {?>
                    <p class="error1"> <?php echo $_GET['error1'] ; ?></p>
                <?php } ?>

                <select class="ina" name="Departement"  size="1">
        <option value="">-- Choississez un département --</option>
        <option value="DGI">Département Genie Infomatique</option>
        <option value="GCBA">Département Genie Chimique et Biologie Appliquée</option>
        <option value="DGM">Département Genie Mecanique</option>
        <option value="DGE">Département Genie Electrique</option>
        <option value="DGC">Département Genie Civil</option>
        <option value="DG">Département Gestion</option>
                </select>
            </fieldset>  


            <fieldset>
                <h3>Cycle</h3>
                <?php if(isset($_GET['error2'])) {?>
                    <p class="error2"> <?php echo $_GET['error2'] ; ?></p>
                <?php } ?>
                  <select class="ina" name="Cycle"  size="1">
                <option value="">-- Choississez un cycle --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                
                </select>
            </fieldset>  
            

            <fieldset>
                <h3>Niveau</h3>

                <?php if(isset($_GET['error3'])) {?>
                    <p class="error3"> <?php echo $_GET['error3'] ; ?></p>
                <?php } ?>

                <select class="ina" name="niveau"  size="1">
                <option value="">-- Choississez un niveau --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                
                </select>
            </fieldset> 


            <fieldset>
                <h3>Filière</h3>
                <?php if(isset($_GET['error4'])) {?>
                    <p class="error4"> <?php echo $_GET['error4'] ; ?></p>
                <?php } ?>

                <input  class="ina" type="text" name="filiere">
                
            </fieldset>
            
            <fieldset>
                <h3>annee d'inscription</h3>

                <?php if(isset($_GET['error5'])) {?>
                    <p class="error5"> <?php echo $_GET['error5'] ; ?></p>
                <?php } ?>


                <input  class="ina" type="number" name="annee_inscription">
            </fieldset>
            
            
            <fieldset>
                <h3>Etat d'inscription</h3>

                <?php if(isset($_GET['error6'])) {?>
                    <p class="error6"> <?php echo $_GET['error6'] ; ?></p>
                <?php } ?>

                <input  class="ina" type="text" name="etat_inscription">
            </fieldset>
            <button onclick="window.location.href='admin.php';" >retour</button>
            <button type="submit">Valider</button>
        </form>
        <button onclick="window.location.href='acceuil.php';" type="submit">Quitter</button>
        
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