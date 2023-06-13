<?php

session_start();
include('../mySQL/cnx.php');
include('admin-sql/display.php');
$email = $_SESSION['email'];

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Administration</title>
        <!-- Styles CSS -->
		<link href="../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<?php

if($email)
{
    ?>
<div class="alert alert-success" role="alert">
    Connecté en tant que : <?php echo $email; ?>
    <a class="text-white text-decoration-none" href="admin-sql/deconnexion/logout.php"><button class="btn btn-danger">Déconnexion</a></button>
</div>
    <?php
}
else
{
    ?>
<div class="alert alert-danger text-center" role="alert">
    Veuillez vous connecter ! 
</div>
<?php
}

?>

<?php

if($email) // SI le mail a bien été trouvé sur la base de données on affiche le contenu de la page
{
    $heure = date('H');

    /* Moment de la journée */
    $matin = 8;
    $midi = 12;
    $soir = 18;
    
    switch($heure)
    {
        // Condition en matinée //
        case $heure == 0:
        case $heure == 1:
        case $heure == 2:
        case $heure == 3:
        case $heure == 4:
        case $heure == 5:
        case $heure == 6:
        case $heure == 7:
        case $heure == $matin:
        case $heure == 9:
        case $heure == 10:
        case $heure == 11:
            ?>
            <div class="jumbotron jumbotron-fluid jumbotron-matin" style="background-color: #F2B544">
                <div class="container">
                    <h1 class="display-4"><?php echo "Bonne matinée : ".$email ?></h1>
                    <p class="lead">C'est l'heure de boire un bon café !</p>
                </div>
            </div>
            <style>
                .jumbotron-aprem, .jumbotron-soir, .jumbotron-midi
                {
                    display: none;
                }
            </style>

            <?php break; ?>

            <!-- Condition à midi -->
            <?php
        case $heure === $midi:
            ?>
        <div class="jumbotron jumbotron-fluid jumbotron-midi" style="background-color: #F2B263">
                <div class="container">
                    <h1 class="display-4"><?php echo "Bon appétit : ".$email ?></h1>
                    <p class="lead">C'est l'heure de manger un bout pour reprendre des force pour cet après midi !</p>
                </div>
            </div>
            <style>
                .jumbotron-matin, .jumbotron-soir
                {
                    display: none;
                }
            </style>
            
            <?php break; ?>

            <!-- Condition en après midi -->
            <?php
            case $heure == 13:
            case $heure == 14:
            case $heure == 15:
            case $heure == 16:
            case $heure == 17:
                ?>
            <div class="jumbotron jumbotron-fluid jumbotron-aprem" style="background-color: #A66641">
                    <div class="container">
                        <h1 class="display-4"><?php echo "Bon après midi : ".$email ?></h1>
                        <p class="lead">Reprise du boulot !</p>
                    </div>
                </div>
                <style>
                    .jumbotron-matin, .jumbotron-soir
                    {
                        display: none;
                    }
                </style>

                <?php break; ?>

        <!-- Condition en soirée -->

        <?php
        case $heure >= $soir:
            ?>
        <div class="jumbotron jumbotron-fluid jumbotron-soir" style="background-color: #1C1C26">
                <div class="container">
                    <h1 class="display-4"><?php echo "Bonne soirée : ".$email ?></h1>
                    <p class="lead text-white">Bonne nuit !</p>
                </div>
            </div>
            <style>
                .jumbotron-matin, .jumbotron-aprem
                {
                    display: none;
                }
            </style>

            <?php break; ?>
        <?php

    }
?>

<div class="container">
             <nav>
                 <ul class="nav flex-column flex-md-row">
                    <h2 class="menu-title">Ajouter :</h2>
                     <li class="nav-item"><a class="nav-link" href="admin-sql/menus/addMenu.php">un menu</a></li>
                     <li class="nav-item"><a class="nav-link" href="admin-sql/carte/addCarte.php">une carte</a></li>
                     <li class="nav-item"><a class="nav-link" href="admin-sql/galerie-img/addImg.php">une image</a></li>
                 </ul>
             </nav>
         </div>

<div class="table-user">
    <h2>Nos clients inscrits :</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id client</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach($displayUser as $displayUsers): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $displayUsers['id'] ?></th>
      <td><?php echo $displayUsers['Nom'] ?></td>
      <td><?php echo $displayUsers['prenom'] ?></td>
      <td><?php echo $displayUsers['email'] ?></td>
      <td><a class="text-decoration-none text-white" href="admin-sql/userGestion/delete.php?id=<?= $displayUsers['id'] ?>"><button class="btn btn-danger">Supprimer</a></button></td>
    </tr>
  </tbody>
<?php endforeach; ?>
</table>
</div>


<!-- Tableau des réservation -->

<h2 class="text-center">Réservations effectuées :</h2>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
        <th>Heure</th>
        <th>Nom du client</th>
        <th>Mail du client</th>
        <th>Téléphone du client</th>
        <th>Nombre de personnes</th>
        <th>Allergies</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php foreach($displayReserv as $displayReservs): ?>
    <tbody>
      <tr>
        <td><?php echo $displayReservs['date'] ?></td>
        <td><?php echo $displayReservs['heure'] ?></td>
        <td><?php echo $displayReservs['nom'] ?></td>
        <td><?php echo $displayReservs['email'] ?></td>
        <td><?php echo $displayReservs['telephone'] ?></td>
        <td><?php echo $displayReservs['nbr_personnes'] ?></td>
        <td><?php echo $displayReservs['allergies'] ?></td>
        <td><a class="text-decoration-none text-white" href="admin-sql/reservationsGestion/delete.php?id=<?= $displayReservs['id']?>"><button class="btn btn-danger">Supprimer</button></a></td>
      </tr>
    </tbody>
    <?php endforeach; ?>
  </table>
</div>

    <?php
    }
    else // SINON On affiche le message d'erreur
    {
        ?>
        <div class="alert alert-danger" role="alert">
            Page réservée aux administrateurs de ce site web ! Si vous êtes un de nos administrateurs veuillez vous connecter <a href="cnx-admin.php">ICI</a>
        </div>
    <?php
    }
    ?>
    </body>
</html>