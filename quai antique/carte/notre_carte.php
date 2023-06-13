<?php

include('../mySQL/cnx.php');
include('../admin/admin-sql/displayCarte.php');

$sql = "SELECT * FROM `carte` 
        ORDER BY `id` DESC";

$req = $db->query($sql);

$displayCards = $req->fetchAll();

?>

<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Notre carte</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>

    <nav class="navbar navbar-brand bg-dark">
        <div class="logo text-white">
            <h1>Quai Antique</h1>
            <a class="text-white text-decoration-none" href="../index.php">
                <button class="btn btn-primary">Retour à l'accueil</a></button>
        </div>
    </nav>
	<div class="container">
		<div class="jumbotron jumbotron-fluid">
  			<div class="container">
    			<h1 class="display-4">Nos cartes</h1>
    			<p class="lead">Toutes les cartes disponibles sur notre site</p>
  			</div>
		</div>
			<div class="row">
                <?php foreach($displayCards as $displayCard): ?>
				<div class="col-md-4">
					<div class="card">
						<img src="../img/cartes/presentation.jpg" class="card-img-top" alt="Image 1">
						<div class="card-body">
							<h5 class="card-title">
								<?php echo $displayCard['titre']; ?>
							</h5>
							<p id="<?php echo $displayCard['id']; ?>-text-plat" class="card-text-plat">
								<?php echo $displayCard['description']; ?>
							</p>

                            
                            <?php 
                            if (strlen($displayCard['description']) > 80) : ?>
                                <button id="<?php echo $displayCard['id']; ?>-show-button" class="btn btn-link" onclick="showFullText('<?php echo $displayCard['id']; ?>')">Lire plus</button>
                                <button id="<?php echo $displayCard['id']; ?>-hide-button" class="btn btn-link" style="display: none;" onclick="hideFullText('<?php echo $displayCard['id']; ?>')">Masquer</button>
                            <?php endif; ?>


							<a href="#" class="btn btn-primary">Commander</a>
						</div>
					</div>
				</div>
                <?php endforeach; ?>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
	</body>
</html>