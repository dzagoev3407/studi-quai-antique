<?php
session_start();
include('../../../mySQL/cnx.php');

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Ajout admin</title>
        <!-- Styles CSS -->
		<link href="../../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<?php

if(isset($_POST['btn-submit']))
{
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if(!empty($email) && !empty($mdp))
    {
        $sql = "INSERT INTO `admin`(`email`, `mdp`) 
            VALUES (:email, :mdp)";

        $req = $db->prepare($sql);

        $req->bindvalue(':email', $email);
        $req->bindvalue(':mdp', $mdp);

        if($req)
        {
            $envoi = $req->execute();

            if($envoi)
            {
                ?>

            <div class="alert alert-success" role="alert">
                L'administrateur avec l'email : <strong><?= $email ?></strong> a bien été ajouté dans la base de données !
                <br>
                Une confirmation par mail va arriver par mail avec toutes les infos
            </div>

            <?php

            /* Ceci va envoyer à l'email de l'administrateur principal du site une confirmation avec toutes les infos du nouvel admin */

            $emailAdmin = "kevin.bonnefoy8407@outlook.fr";
            $sujet = "Nouvel Admin ajouté";
            $message = "Bonjour, vous venez d'ajouter un administrateur pour qu'il puisse faire des modifications sur votre site web. Bonne journée !";
            $infoNewAdmin = "Voici ses infos, email : ".$email." et son mot de passe : ".$mdp.".";

            mail($emailAdmin, $sujet, $message, $infoNewAdmin);
            
            }
            else
            {
                ?>
                
            <div class="alert alert-danger" role="alert">
                L'administrateur n'a pas été ajouté dans la base de données ! Réessayez !
            </div>

                <?php
            }
        }
    }
}