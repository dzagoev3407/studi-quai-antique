<?php
session_start();
include('../mySQL/cnx.php');
$email = $_SESSION['email'];

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Espace client</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<body>

<?php

if($email)
{
    ?>

<div class="welcome" id="popup-welcome">
    <div class="popup-welcome">
        <div class="alert alert-success" role="alert">
            <h2>Connexion réussie !</h2>
            <p>Vous êtes connecté à votre espace client en tant que <?php echo $email; ?></p>
        </div>
        <button class="btn btn-success" onclick="closeWelcomePopup()">Fermer</button>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Quai Antique - Espace client</h1>
    <p class="lead">Connecté en tant que : <strong><?php echo $email ?></strong></p>
  </div>
</div>

<!-- Barre de navigation -->

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="#">Mes réservations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="reservation/reserv.php" target="_blank">Réserver</a>
  </li>
  <li class="nav-item">
    <a class="text-decoration-none text-white" href="logout.php"><button class="btn btn-danger">Déconnexion</a></button>
  </li>
</ul>

<div class="container-recap-info">
    <h1>Vos informations client</h1>
    <table>
      <tr>
        <th>Nom & prénom</th>
        <td class="name-info" id="name_info"><?php echo $nom ?> <?php echo $prenom ?></td>
      </tr>
      <tr>
        <th>Adresse e-mail</th>
        <td class="email-info" id="email_info"><?php echo $email ?></td>
      </tr>
      <tr>
        <th>Téléphone</th>
        <td class="phone-info" id="phone_info">

        </td>
      </tr>
      <tr>
        <th>Ville</th>
        <td class="city-info" id="city_info"></td>
      </tr>
    </table>
      <button class="btn btn-primary" onclick="modifyInfos()">Modifier</button>
  </div>

<?php
}
else
{
    ?>

    <div class="alert alert-danger" role="alert">
        Espace réservé aux membres inscrits sur notre site web !
    </div>

    <?php
}

?>

</body>
<script src="../js/script.js"></script>
</html>