<?php
session_start();
include 'db.php';
if(isset($_POST['login']) && isset($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if(empty($login))
    {
        header("Location: connecter.php?error=Le login est obligatoire");
        exit();
    }
    else if(empty($password))
    {
        header("Location: connecter.php?error=Le mot de passe est obligatoire");
        exit();
    }

    else
    {
        $sql1 = "SELECT * from utilisateur WHERE login = '$login' AND password = '$password'";
        $result1 = mysqli_query($conn,$sql1);

        if(mysqli_num_rows($result1) == 1)
        {
            $row1 = mysqli_fetch_assoc($result1);

            if($row1['login'] == $login && $row1['password'] == $password)
            {
                $_SESSION['login'] = $row1['login'];
                $_SESSION['password'] = $row1['password'];
                
                $sql2 = "SELECT * FROM utilisateur left join identification on utilisateur.idUtilisateur = identification.idUtilisateur where utilisateur.login = '$login'";
                
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                $_SESSION['Nom'] = $row2['Nom'];
                $_SESSION['Prenom'] = $row2['Prenom'];
                $_SESSION['Civilite'] = $row2['Civilite'];
                $_SESSION['Date_de_naissance'] = $row2['Date_de_naissance'];
                $_SESSION['Lieu_de_naissance'] = $row2['Lieu_de_naissance'];
                $_SESSION['CNI'] = $row2['CNI'];
                $_SESSION['INE'] = $row2['INE'];
                $_SESSION['numero_carte'] = $row2['numero_carte'];
                $_SESSION['Pays_de_naissance'] = $row2['Pays_de_naissance'];
                $_SESSION['Nationalite'] = $row2['Nationalite'];
            
                
                $sql3 = "SELECT * FROM utilisateur left join adresse on utilisateur.idUtilisateur = adresse.idUtilisateur where utilisateur.login = '$login'";
                $result3 = mysqli_query($conn,$sql3);
                $row3 = mysqli_fetch_assoc($result3);
            
                
                $_SESSION['Adresse_principale'] = $row3['Adresse_principale'];
                $_SESSION['Adresse_secondaire'] = $row3['Adresse_secondaire'];
                $_SESSION['Email'] = $row3['Email'];
                $_SESSION['Telephone_portable'] = $row3['Telephone_portable'];
                $_SESSION['Telephone_fixe'] = $row3['Telephone_fixe'];
                $_SESSION['Email_personnel'] = $row3['Email_personnel'];
                $_SESSION['Email_institutionnel'] = $row3['Email_institutionnel'];
                $_SESSION['Boite_postale'] = $row3['Boite_postale'];
                
                
                $sql4 = "SELECT * FROM utilisateur left join situation_familiale on utilisateur.idUtilisateur = situation_familiale.idUtilisateur where utilisateur.login = '$login'";
                $result4 = mysqli_query($conn,$sql4);
                $row4 = mysqli_fetch_assoc($result4);
                
                
                $_SESSION['Situation_matriomoniale'] = $row4['Situation_matriomoniale'];
                $_SESSION['Nombre_enfants'] = $row4['Nombre_enfants'];
                
                
                $sql5 = "SELECT * FROM utilisateur left join bourses on utilisateur.idUtilisateur = bourses.idUtilisateur where utilisateur.login = '$login'";
                $result5 = mysqli_query($conn,$sql5);
                $row5 = mysqli_fetch_assoc($result5);
                
                
                $_SESSION['Bourse'] = $row5['Bourse'];
                $_SESSION['Nature_de_la_bourse'] = $row5['Nature_de_la_bourse'];
                $_SESSION['Montant_de_la_bourse'] = $row5['Montant_de_la_bourse'];
                
                
                $sql6 = "SELECT * FROM utilisateur left join contact on utilisateur.idUtilisateur = contact.idUtilisateur where utilisateur.login = '$login'";
                $result6 = mysqli_query($conn,$sql6);
                $row6 = mysqli_fetch_assoc($result6);
                
                
                $_SESSION['nom'] = $row6['Nom'];
                $_SESSION['prenom'] = $row6['Prenom'];
                $_SESSION['Adresse'] = $row6['Adresse'];
                $_SESSION['Ville'] = $row6['Ville'];
                $_SESSION['telephone_portable'] = $row6['Telephone_portable'];
                $_SESSION['telephone_fixe'] = $row6['Telephone_fixe'];
                $_SESSION['email_personnel'] = $row6['Email_personnel'];
                $_SESSION['boite_postale'] = $row6['Boite_postale'];
                $_SESSION['Fax'] = $row6['Fax'];
                $_SESSION['Responsable_etudiant'] = $row6['Responsable_etudiant'];
                $_SESSION['Personne_a_contacter'] = $row6['Personne_a_contacter'];
                
                
                
                $sql7 = "SELECT * FROM utilisateur left join inscriptions_pedagogique on utilisateur.idUtilisateur = inscriptions_pedagogique.idUtilisateur where utilisateur.login = '$login'";
                $result7 = mysqli_query($conn,$sql7);
                $row7 = mysqli_fetch_assoc($result7);
                
                $_SESSION['annee_Inscription'] = $row7['annee_Inscription'];
                $_SESSION['cycle'] = $row7['cycle'];
                $_SESSION['niveau'] = $row7['niveau'];
                $_SESSION['departement'] = $row7['departement'];
                $_SESSION['filiere'] = $row7['filiere'];
                $_SESSION['Etat_inscription'] = $row7['Etat_inscription'];
            

                header("Location: profil.php");
                
            }
        }

        else
        {
            header("Location: connecter.php?error=le login ou le mot de passe est incorrect");
        }
    }
    
    
}

?>