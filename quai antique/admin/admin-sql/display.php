<?php

include('../../mySQL/cnx.php');

$sql = "SELECT * FROM `registerQuaiAntique` ORDER BY `id` DESC"; // On affiche les utilisateur du plus récent au plus ancien

$req = $db->query($sql);

$displayUser = $req->fetchAll();

/* Affiche les réservations effectuées sur le site */

$sqlDeux = "SELECT * FROM `reservations` ORDER BY `id` DESC";

$reqDeux = $db->query($sqlDeux);

$displayReserv = $reqDeux->fetchAll();