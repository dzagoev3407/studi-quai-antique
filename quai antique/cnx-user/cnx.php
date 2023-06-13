<?php
session_start();
include('../mySQL/cnx.php');

$home = '../index.php'; // Page d'accueil
$cnxAdmin = '../admin/cnx-admin.php'; // Tableau de bord pour les administrateurs
$emailAdmin = 'kevin.bonnefoy8407@outlook.fr'; // email admin

/* Traitement connexion utilisateur */

if(isset($_POST['btn-submit']))
{
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    if(!empty($email) && !empty($mdp))
    {
        $sql = 'SELECT * FROM `registerQuaiAntique` WHERE email = ? AND mdp = ?';

        $cnxUser = $db->prepare($sql);

        $cnxUser->execute(array($email, $mdp));

        if($cnxUser->rowCount() > 0)
        {
            $_SESSION['email'] = $email;
            $pageUser = 'espace-user.php'; // Page de redirection vers l'espace utilisateur

            if($email)
            {
                header("Location: $pageUser");
            }
            
        }
        else
        {
            ?>

        <div class="alert alert-danger" role="alert">
            Aucune de ses informations ne correspondent à un de nos utilisateurs de notre base de données !
        </div>

            <?php

        }
    }
    else
    {
        echo 'Erreur !';
    }
}

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Connexion client</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<body>

<form action="" method="POST" class="form-register">
    <div class="logo-register">
        <h2>Quai Antique - Connexion client</h2>
    </div>
      <label for="inputEmail" class="sr-only">Votre adresse email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="exemple@exemple.fr" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Votre mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="votre mot de passe" name="mdp" required>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Connexion" name="btn-submit" type="submit">
      <p>Vous êtes l'administrateur de ce site ? Veuillez vous connecter <a href="../admin/cnx-admin.php">ICI</a></p>
    </form>
</body>