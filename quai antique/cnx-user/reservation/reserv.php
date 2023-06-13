<?php

session_start();
include('../../mySQL/cnx.php');
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
		<title>Quai Antique - Réservation</title>
        <!-- Styles CSS -->
		<link href="../../css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
<body>

<div class="container-reservation">
    <h1 class="title-reserv">Réservation</h1>
    <form method="POST" action="envoi.php">
      <label for="name">Nom :</label>
      <input type="text" name="nom" id="name_reserv" required>

      <label class="label-resev" for="email">Adresse e-mail :</label>
      <input type="email" name="email" id="email_reserv" value="<?php echo $email ?>" required>

      <label class="label-resev" for="phone">Téléphone :</label>
      <input type="tel" name="tel" id="telephone_reserv" required>

      <label class="label-resev" for="date">Date de réservation :</label>
      <input type="date" name="date" id="date_reserv" required>

      <label class="label-resev" for="heure">Heure de réservation :</label>
      <input type="time" name="heure" id="time_reserv" required>

      <label class="label-resev" for="personnes">Nombre de personnes :</label>
      <select id="personnes" name="personnes" required>
        <option value="">Sélectionnez</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>

      <label class="label-resev" for="allergie">Allergie (Facultatif) :</label>
      <textarea name="allergie" id="allergie"></textarea>

    <div class="text-center">
        <a class="text-decoration-none text-white" href="../espace-user.php"><button type="button" class="btn-submit-reserv" name="btn-submit">Retour</a></button>
        <button type="submit" class="btn-submit-reserv" name="btn-submit">Réserver</button>
    </div>
    </form>
  </div>
</body>
<script src="../../js/script.js"></script>
</html>