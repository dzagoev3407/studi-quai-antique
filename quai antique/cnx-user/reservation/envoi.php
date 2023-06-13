<?php
session_start();
include('../../mySQL/cnx.php');

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Réservation réussie !</title>
        <!-- Styles CSS -->
		<link href="../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>    

<?php

if(isset($_POST['btn-submit']))
{
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $personnes = $_POST['personnes'];
    $allergie = $_POST['allergie'];

    if(!empty($nom) && !empty($email) && !empty($tel) && !empty($date) && !empty($heure) && !empty($personnes));
    {
        $sql = "INSERT INTO `reservations`(`nom`, `email`, `telephone`, `date`, `heure`, `nbr_personnes`, `allergies`) 
                VALUES (:nom, :email, :telephone, :date, :heure , :nbr_personnes, :allergie)";

        $req = $db->prepare($sql);

        $req->bindvalue(":nom", $nom);
        $req->bindvalue(":email", $email);
        $req->bindvalue(":telephone", $tel);
        $req->bindvalue(":date", $date);
        $req->bindvalue(":heure", $heure);
        $req->bindvalue(":nbr_personnes", $personnes);
        $req->bindvalue(":allergie", $allergie);

        if($req)
        {
            if(!empty($allergie))
            {
                $req->execute();
                ?>

            <div class="alert alert-success" role="alert">
                <h1 class="text-center">Réservation effectuée !</h1>
                Réservation effectuée avec succès ! Vous avez bien mentionné l'allergie ou les allergies ci-dessous : 
                <br>
                Vos allergies mentionnée : <strong><?php echo $allergie ?></strong>.
            </div>

                <a href="../espace-user.php"><button class="btn btn-success">Espace client</button></a>

            <?php
            }
            elseif(empty($allergie))
            {
                $req->execute();
                ?>

            <div class="alert alert-success" role="alert">
                <h1 class="text-center">Réservation effectuée !</h1>
                Réservation effectuée avec succès !
                <br>
                Pour rappel vous n'avez pas mentionné d'allergie !
            </div>

                <a href="../espace-user.php"><button class="btn btn-success">Espace client</button></a>

            <?php
            }
        }
    }
}
?>

</body>
</html>