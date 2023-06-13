<?php

include('../../../mySQL/cnx.php');

if(isset($_POST['btn-add']))
{
    $title = $_POST['title-card'];
    $desc = $_POST['desc-card'];
    $prix = $_POST['price-card'];

    if(!empty($title) && !empty($desc) && !empty($prix))
    {
        $sql = "INSERT INTO `carte`( `titre`, `description`, `prix`) 
                VALUES (:title_card , :desc_card, :price_card)";

        $req = $db->prepare($sql);

        $req->bindvalue(':title_card', $title);
        $req->bindvalue(':desc_card', $desc);
        $req->bindvalue(':price_card', $prix);

        if($req)
        {
            $envoiCarte = $req->execute();
            if($envoiCarte)
            {
                ?>
            <div class="alert alert-success" role="alert">
                    <?php echo "La carte nommé : <strong>".$title."</strong> a bien été ajoutée dans notre base de données !"; ?>
                </div>
               <a class="text-decoration-none text-white" href="../../dashboard.php"><button id="confirmButton" class="btn btn-primary">Retour</a></button>
        </div>
    </div>
    <?php
            }
            else
            {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "La carte nommé : <strong>".$title."</strong> n'a pas bien été ajoutée dans notre base de données !"; ?>
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
		<title>Quai Antique - Ajouter une carte</title>
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
        <h2>Quai Antique - Ajouter une carte</h2>
        <h3 class="text-center">Ceci servira à ajouter des cartes pour les présenter sur le site</h3>
    </div>
      <label for="title-card" class="sr-only">Titre de la carte</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Titre de la carte" name="title-card" required autofocus>
      <label for="desc-card" class="sr-only">Description</label>
      <textarea type="text" id="inputEmail" class="form-control" placeholder="description de la carte" name="desc-card" required autofocus></textarea>
      <label for="price-card" class="sr-only">Prix</label>
      <input type="text" id="price-card" name="price-card" placeholder="Votre prix">
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ajouter" name="btn-add" type="submit">
</form>


<?php
/* Script permettant de connaître le nombre de cartes disponible dans notre base de données */

$countQuery = "SELECT COUNT(*) as titre FROM carte";
$stmt = $db->query($countQuery);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$totalCarte = $row["titre"];

if ($totalCarte > 0) 
{
    echo "Il y a actuellement : " . $totalCarte . " cartes disponible(s).";
} 
else 
{
    echo "Aucune carte disponible pour le moment !";
}

?>

<a class="text-white text-decoration-none" href="../../dashboard.php"><button class="btn btn-primary">Retour</a></button>
</body>
</html>