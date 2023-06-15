<?php

include('../mySQL/cnx.php');

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Inscription réussie</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<?php

if(isset($_POST['btn-submit']))
{
  $email = htmlspecialchars($_POST['email']);
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $mdp = htmlspecialchars($_POST['mdp']);

  if(!empty($email) && !empty($mdp))
  {
    $sql = "INSERT INTO `registerQuaiAntique`(`email`, `mdp`, `Nom`, `prenom`) 
          VALUES (:email, :mdp, :nom, :prenom)";

    $req = $db->prepare($sql);

    $req->bindvalue(':email', $email);
    $req->bindvalue(':mdp', $mdp);
    $req->bindvalue(':nom', $nom);
    $req->bindvalue(':prenom', $prenom);

    if($req)
    {
        $registerUser = $req->execute();
        if($registerUser)
        {

          /* Le code pour envoyer la confirmation de l'inscription à l'email de l'utilisateur */
          
          $to = $email;
          $sujet = "Confirmation de votre inscription";
          $message = "Merci de votre inscription sur le site du restaurant du Quai Antique, vous pouvez désormais vous connecter à votre espace client ICI !";
          $linkEspaceClient = "https://kevinbonnefoy.fr/quai_antique/cnx-user/cnx.php";

          mail($to, $sujet, $message, $linkEspaceClient);

          ?>
        <div class="alert alert-success" role="alert">
            Votre adresse email : <strong><?php echo $email ?></strong> ainsi que votre nom et prénom <?php echo $nom.$prenom ?>, ont bien été ajouté à notre base de données !";
            <br>
            Vous pouvez dès à présent vous connecter à votre espace client !
            <br>
            Un mail de confirmation va vous être envoyé à l'adresse : <?= $email ?>
            
            <a class="text-decoration-none text-white" href="../cnx-user/cnx.php"><button class="btn btn-success">Se connecter</a></button>
        </div>

            <?php
        }
    }
    else
    {
      ?>

    <div class="alert alert-danger" role="alert">
        Inscription échouée !
    </div>

    <?php
    }
  }
}