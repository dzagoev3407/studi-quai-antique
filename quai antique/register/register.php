<?php

$home = "../index.php"; // Page d'accueil

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Accueil</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<nav class="navbar-register">
  <h1 class="logo">Quai Antique</h1>
  <ol class="breadcrumb">
    <a class="text-decoration-none" href="<?php echo $home ?>"><li class="breadcrumb-item active text-white" aria-current="page">Accueil</li></a>
  </ol>
</nav>

<form action="envoi.php" method="POST" class="form-register">
    <div class="logo-register">
        <h2>Quai Antique - Inscription</h2>
    </div>
      <label for="inputEmail" class="sr-only">Votre adresse email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="exemple@exemple.fr" name="email" required autofocus>
      <label for="inputEmail" class="sr-only">Votre nom</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Dupont" name="nom" required autofocus>
      <label for="inputEmail" class="sr-only">Votre prénom</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Mathias" name="prenom" required autofocus>
      <label for="inputPassword" class="sr-only">Votre mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Votre mot de passe" name="mdp" required>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="S'inscrire" name="btn-submit" type="submit">
    </form>

</body>