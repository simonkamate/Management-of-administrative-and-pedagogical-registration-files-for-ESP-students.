<?php
session_start();

include'db_conn.php';
if(isset($_POST['Departement']) && isset($_POST['Cycle']) &&
isset($_POST['niveau']) && isset($_POST['filiere'])
&& isset($_POST['annee_inscription']) && isset($_POST['etat_inscription']))
{
    $departement = $_POST['Departement'];
    $cycle = $_POST['Cycle'];
    $niveau = $_POST['niveau'];
    $filiere = $_POST['filiere'];
    $anneeInscription = $_POST['annee_inscription'];
    $etatInscription = $_POST['etat_inscription'];
    if(empty($departement))
    {
        header("Location: peda.php?error1=Le departement est obligatoire");
        exit();
    }
    else if(empty($cycle))
    {
        header("Location: peda.php?error2=Le cycle est obligatoire");
        exit();
    }
    else if(empty($niveau))
    {
        header("Location: peda.php?error3=Le niveau est obligatoire");
        exit();
    }
    else if(empty($filiere))
    {
        header("Location: peda.php?error4=La filiere est obligatoire");
        exit();
    }
    else if(empty($anneeInscription))
    {
        header("Location: peda.php?error5=L'annee d'inscription est obligatoire");
        exit();
    }
    else if(empty($etatInscription))
    {
        header("Location: peda.php?error6=L'etat d'inscription est obligatoire");
        exit();
    }

    else
    {
        try
            {
                $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
                        // on va hasher le mot de passe
                       $sql = 'INSERT INTO inscriptions_pedagogique (annee_Inscription,cycle,niveau,departement,filiere,Etat_inscription) VALUES 
                       (:annee_Inscription, :cycle, :niveau, :departement, :filiere, :Etat_inscription)';
                       $request = $PDO->prepare($sql);
                       $request ->execute([
                           'annee_Inscription' =>$anneeInscription,
                           'cycle' =>$cycle,
                           'niveau' =>$niveau,
                           'departement' =>$departement,
                           'filiere' =>$filiere,
                           'Etat_inscription' =>$etatInscription
                       ]);

                if($request)
                {
                    header("Location: peda.php?success=Le compte a ete crée avec success");
                    exit();
                } 
                
                else
                {
                    header("Location: peda.php?success=Une erreur s'est produite");
                    exit();

                }
            }

            catch(PDOException $pe)
            {
                die('Erreur : '.$pe->getMessage());
            }
    }
    
    
}

?>