<?php

include('../../../mySQL/cnx.php');

if(isset($_POST['btn-add']))
{
    $nameImg = $_POST['name-img'];
    $urlImg = $_POST['url-img'];

    if(!empty($nameImg) && !empty($urlImg))
    {
        $sql = "INSERT INTO `img`(`nomImage`, `url`) 
                VALUES (:nameImg, :urlImg)";
        
        $req = $db->prepare($sql);

        $req->bindvalue(':nameImg', $nameImg);
        $req->bindvalue(':urlImg', $urlImg);

        if($req)
        {
            $envoiImg = $req->execute();

            if($envoiImg)
            {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo "Votre image avec le nom ".$nameImg." a bien été envoyée !"; ?>
                    <strong>Pensez à copier l'url : <?php echo $urlImg; ?> pour mettre l'image sur la galerie de la page d'accueil !</strong>
                </div>
            <?php
            }
            else
            {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Votre image n'a pas été envoyée ! Réessayez !"; ?>
                </div>
            <?php
            }
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
		<title>Quai Antique - Ajouter une image</title>
        <!-- Styles CSS -->
		<link href="../../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>
<form action="" method="POST" class="form-register">
    <div class="logo-register">
        <h2>Quai Antique - Ajouter une image</h2>
        <h3 class="text-center">Ceci servira à ajouter des images pour le slider dans la page d'accueil</h3>
    </div>
      <label for="inputNameImg" class="sr-only">Nom de l'image</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Nom de votre image" name="name-img" required autofocus>
      <label for="inputPassword" class="sr-only">url de l'image</label>
      <textarea name="url-img"></textarea>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ajouter" name="btn-add" type="submit">
    </form>

    <a class="text-white text-decoration-none" href="../../dashboard.php"><button class="btn btn-primary">Retour</a></button>

</body>