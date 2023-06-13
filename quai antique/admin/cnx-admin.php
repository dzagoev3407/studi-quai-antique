<?php
/* Traitement connexion utilisateur */
session_start();
include('../mySQL/cnx.php');
$home = '../index.php';

if(isset($_POST['btn-submit']))
{
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if(!empty($email) && !empty($mdp))
    {
        $sql = 'SELECT * FROM `admin` WHERE email = ? AND mdp = ?';

        $cnxAdmin = $db->prepare($sql);

        $cnxAdmin->execute(array($email, $mdp));

        if($cnxAdmin->rowCount() > 0)
        {
            $_SESSION['email'] = $email;
            $url = 'dashboard.php';
            if($email)
            {
                header("Location: $url");
            }
        }
        else
        {
            ?>
            <div class="alert alert-danger cnx-none" role="alert">
                Votre pseudo ou mot de passe est incorrect !
            </div>
            <?php
        }
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
		<title>Quai Antique - Connexion Administrateur</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<nav class="navbar-register">
  <h1 class="logo">Quai Antique - Connexion administrateur</h1>
  <ol class="breadcrumb">
    <a class="text-decoration-none" href="<?php echo $home ?>"><li class="breadcrumb-item active text-white" aria-current="page">Accueil</li></a>
  </ol>
</nav>

<form action="" method="POST" class="form-register">
    <div class="logo-register">
        <h2>Quai Antique - Connexion Administrateur</h2>
    </div>
      <label for="inputEmail" class="sr-only">Votre adresse email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="exemple@exemple.fr" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Votre mot de passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Votre mot de passe" name="mdp" required>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Connexion" name="btn-submit" type="submit">
    </form>

</body>