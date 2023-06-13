<?php
session_start();
include('../../../mySQL/cnx.php');
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
		<title>Quai Antique - Ajouter administrateur</title>
        <!-- Styles CSS -->
		<link href="../../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<?php

if($email)
{
    ?>


<form action="ajout.php" method="POST" class="form-register">
    <div class="logo-register">
        <h2>Quai Antique - Ajouter un administrateur</h2>
    </div>
      <label for="inputEmail" class="sr-only">adresse email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="exemple@exemple.fr" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Votre mot de passe" name="mdp" required>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ajouter" name="btn-submit" type="submit">
</form>

<div class="text-center">
    <a class="text-decoration-none text-white" href="../../dashboard.php"><button class="btn btn-primary">Retour</a></button>
</div>


    <?php
}
else
{
    ?>


<div class="alert alert-danger" role="alert">
    Espace réservé à l'administrateur du site
</div>

<?php

}

?>

</body>