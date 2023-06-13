<?php

include('../../../mySQL/cnx.php');

/* On affiche les 5 dernières cartes ajoutées à la BDD */

$sql = "SELECT * FROM `carte` 
        ORDER BY `id` DESC LIMIT 5";

$req = $db->query($sql);

$displayCardsLastFive = $req->fetchAll();