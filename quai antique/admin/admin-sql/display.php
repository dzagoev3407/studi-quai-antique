<?php

include('../../mySQL/cnx.php');

$sql = "SELECT * FROM `registerQuaiAntique` ORDER BY `id` DESC"; // On affiche les utilisateur du plus récent au plus ancien

$req = $db->query($sql);

$displayUser = $req->fetchAll();

/* Affiche les réservations effectuées sur le site */

$sqlDeux = "SELECT * FROM `reservations` ORDER BY `id` DESC";

$reqDeux = $db->query($sqlDeux);

$displayReserv = $reqDeux->fetchAll();

/* Affiche les utilisateurs inscrits sur le site */

$sqlDisplayUserRegister = "SELECT COUNT(*) AS `id` FROM registerQuaiAntique";

$reqRegisterUser = $db->query($sqlDisplayUserRegister);

$displayUserRegister = $reqRegisterUser->fetch();

$displayUserRegisterCount = $displayUserRegister['id'];

/* Affiche les cartes et menus disponibles sur le site */

$sqlDisplayCarte = "SELECT COUNT(*) AS `id` FROM carte";

$reqDisplayCarte = $db->query($sqlDisplayCarte);

$fetchDisplayCarte = $reqDisplayCarte->fetch();

$displayCarte = $fetchDisplayCarte['id'];

/* ========================= */

$sqlDisplayMenus = "SELECT COUNT(*) AS `id` FROM menus";

$reqDisplayMenus = $db->query($sqlDisplayMenus);

$fetchDisplayMenus = $reqDisplayMenus->fetch();

$displayMenus = $fetchDisplayMenus['id'];

/* Affiche le nombre d'administrateur disponible sur le site */

$sqlDisplayAdmins = "SELECT COUNT(*) AS `id` FROM admin";

$reqDisplayAdmins = $db->query($sqlDisplayAdmins);

$fetchDisplayAdmins = $reqDisplayAdmins->fetch();

$displayAdmins = $fetchDisplayAdmins['id'];

/* ======================================== */

/* Affiche le nombre de réservations effectuées sur le site */

$sqlDisplayReservation = "SELECT COUNT(*) AS `id` FROM reservations";

$reqDisplayReservation = $db->query($sqlDisplayReservation);

$fetchDisplayReservation = $reqDisplayReservation->fetch();

$displayReservation = $fetchDisplayReservation['id'];

/* Afficher nos administrateurs */

$sqlDisplayAdminTable = "SELECT * FROM `admin` 
                         ORDER BY `id` DESC";

$reqDisplayAdminTable = $db->query($sqlDisplayAdminTable);

$displayAdminTable = $reqDisplayAdminTable->fetchAll();