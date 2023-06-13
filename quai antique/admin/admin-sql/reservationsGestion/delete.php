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

$id = $_GET['id']; // ID de la réservation

if($id)
{
    $sql = "DELETE FROM `reservations` WHERE `id` = $id";

    $req = $db->prepare($sql);

    if($req)
    {
        $suppression = $req->execute();

        if($suppression)
        {
            ?>

        <div class="alert alert-success" role="alert">
            La réservation pour id : <strong><?= $id ?></strong> a bien été supprimée !
            <a class="text-white text-decoration-none" href="../../dashboard.php"><button class="btn btn-success">Retour</a></button>
        </div>

        <?php
        }
        else
        {
            ?>
            
        <div class="alert alert-danger" role="alert">
            La réservation n'a pas été supprimée ! Réessayez !
        </div>

        <?php
        }
    }
}
else
{
    echo 'Non';
}