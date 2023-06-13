<?php

include('../../../mySQL/cnx.php');

if(isset($_POST['btn-add']))
{
    $title = $_POST['title-menu'];
    $select = $_POST['formule-menu'];
    $desc = $_POST['desc'];

    if(!empty($title) && !empty($select) && !empty($desc))
    {
        $sql = "INSERT INTO `menus`(`titre`, `formule`, `description`) 
                VALUES (:title_menu, :formule_menu, :desc_menu)";

        $req = $db->prepare($sql);

        $req->bindvalue(':title_menu', $title);
        $req->bindvalue(':formule_menu', $select);
        $req->bindvalue(':desc_menu', $desc);

        if($req)
        {
            $envoiMenu = $req->execute();
            if($envoiMenu)
            {
                ?>
            <div class="alert alert-success" role="alert">
                    <?php echo "Le menu nommé : ".$title." a bien été ajouté dans notre base de données !"; ?>
                </div>
               <a class="text-decoration-none text-white" href="../../dashboard.php"><button id="confirmButton" class="btn btn-primary">Retour</a></button>
        </div>
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
		<title>Quai Antique - Ajouter un menu</title>
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
        <h2>Quai Antique - Ajouter un menu</h2>
        <h3 class="text-center">Ceci servira à ajouter des menus pour les présenter sur le site</h3>
    </div>
      <label for="inputNameImg" class="sr-only">Titre du menu</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Titre du menu" name="title-menu" required autofocus>
      <label for="inputPassword" class="sr-only">Formule</label>
      <select name="formule-menu" id="formule-select">
        <option value="">--Veuillez choisir une formule--</option>
        <option value="Formule repas complet (entrée, plat chaud et dessert)">Formule repas complet (entrée, plat chaud et dessert)</option>
        <option value="formule enfant">Formule enfant</option>
        <option value="Formule café après le repas">Formule café après le repas</option>
        <option value="Formule petite faim">Formule petite faim</option>
    </select>
        <label for="inputNameImg" class="sr-only">Description du menu :</label>
        <textarea type="text" name="desc"></textarea>
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ajouter" name="btn-add" type="submit">
</form>


<?php
/* Script permettant de connaître le nombre de menus disponible dans notre base de données */

$countQuery = "SELECT COUNT(*) as titre FROM menus";
$stmt = $db->query($countQuery);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$totalMenus = $row["totalMenus"];

if ($totalMenus > 0) 
{
    echo "Il y a actuellement : " . $totalMenus . " menu disponible(s).";
} 
else 
{
    echo "Aucun menu disponible pour le moment !";
}

?>

<a class="text-white text-decoration-none" href="../../dashboard.php"><button class="btn btn-primary">Retour</a></button>
</body>
</html>