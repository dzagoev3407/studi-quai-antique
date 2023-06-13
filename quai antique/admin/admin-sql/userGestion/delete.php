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
		<title>Quai Antique - Suppression</title>
        <!-- Styles CSS -->
		<link href="../../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<?php

/* Supprimer un utilisateur de la base de données */

$id = $_GET['id']; // ID de l'utilisateur qu'on va supprimer

if(isset($id))
{
    $sql = "DELETE FROM `registerQuaiAntique` WHERE `id` = $id";

    $req = $db->prepare($sql);

    if($req)
    {
        $suppression = $req->execute();
        if($suppression)
        {
            ?>

        <div class="alert alert-success text-center" role="alert">
            Suppression de l'utilisateur avec l'id <?= ".$id."?> a bien été supprimé de notre base de données !
        </div>
        <a class="text-decoration-none text-white" href="../dashboard.php"><button class="btn btn-success">Retour</a></button>

        <?php
        }
        else
        {
            ?>

        <div class="alert alert-danger text-center" role="alert">
            Suppression échouée !
        </div>

            <?php
        }
    }
    else
    {
        echo "Suppresion échouée !";
    }
}
else
{
    echo "Non";
}