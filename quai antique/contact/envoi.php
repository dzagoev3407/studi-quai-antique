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
		<title>Quai Antique - Message envoyé !</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<?php

if(isset($_POST['envoi']))
{
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(!empty($nom) && !empty($email) && !empty($message))
    {
        $sql = "INSERT INTO `contact`(`nom`, `email`, `message`) 
                VALUES (:nom , :email , :message )";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $nom);
        $req->bindvalue(':email', $email);
        $req->bindvalue(':message', $message);

        $envoi = $req->execute();

        if($envoi)
        {
            ?>
            <div class="alert alert-success" role="alert">
                Message envoyé ! Nous vous répondrons dans les plus brefs délais !
            </div>
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-danger" role="alert">
                Message non envoyé ! Veuillez Réessayez !
            </div>
            <?php
        }
    }
}
