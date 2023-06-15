<?php
session_start();
include('../../mySQL/cnx.php');
$email = $_SESSION['email']; // email de l'utilisateur

/* ============================= */
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Mes réservations</title>
        <!-- Styles CSS -->
		<link href="../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>

<body>

<?php

if($email)
{

    $sqlSelect = "SELECT * FROM reservation_count WHERE email = :email";
    $stmtSelect = $db->prepare($sqlSelect);
    $stmtSelect->bindvalue(':email', $email);
    $stmtSelect->execute();
    $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    for($i = 0; $i < 1; $i++)
    {
        echo "Trouvé !";
    }

    $total = $i;

    if($result)
    {
        $currentCount = $result['count'];
        $newCount = $currentCount + $total;

        $sqlUpdate = "UPDATE reservation_count SET count = :count WHERE email = :email";
        $stmtUpdate = $db->prepare($sqlUpdate);
        $stmtUpdate->bindvalue(':count', $newCount);
        $stmtUpdate->bindvalue(':email', $email);
        $envoi = $stmtUpdate->execute();
        if($envoi)
        {
            $total++;
            ?>
            <div class="alert alert-success" role="alert">
                <h1 class="text-center text-white">Compteur mis à jour !</h1>
                <p class="text-white">L'utilisateur <?= $email ?> a un nouvel ajout sur ses réservations, son nombre maintenant : <?= $total ?></p>
            </div>
            <?php
        }
    }
    else
    {
        for($i = 0; $i < 1; $i++)
        {
            echo "Ajouté au compte";
        }

        $total = $i;

        $sql = "INSERT INTO `reservation_count`(`email`, `count`) 
            VALUES (:email, :count)";

        $req = $db->prepare($sql);

        $req->bindvalue(":email", $email);
        $req->bindvalue(":count", $total);

        $ajout = $req->execute();
        ?>

        <div class="alert alert-success" role="alert">
            <h1 class="text-center text-white">Et de UN !</h1>
            <p class="text-white">L'utilisateur <?= $email ?> a un nouvel ajout sur ses réservations, son nombre actuellement : <?= $total ?></p>
        </div>

        <?php
    }
}
else
{
  ?>

    <div class="alert alert-danger" role="alert">
        <h1 class="text-center text-white">ATTENTION !</h1>
        <p class="text-white">Page réservée aux utilisateur de ce site ! Veuillez vous connecter ou vous inscrire !</p>
    </div>

  <?php
}

?>


</body>
</html>