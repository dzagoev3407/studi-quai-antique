<?php

include('mySQL/cnx.php');
include('admin/admin-sql/carte/displayCarte.php');

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Quai Antique - Accueil</title>
        <!-- Styles CSS -->
		<link href="css/styles.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<h1 class="logo text-white" href="#">Quai Antique</h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"><a class="nav-link" href="#">Accueil</a></li>
						<li class="nav-item"><a class="nav-link" href="carte/notre_carte.php">Notre carte</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Galerie</a></li>
						<li class="nav-item"><a class="nav-link disabled" href="#">Contact</a></li>
					</ul>
                    <div class="btn-reservation">
					<button class="btn btn-primary" id="btn-reserv" onclick="popupReserv()">Réserver</button>

				<div id="modal-cnx-reserv" class="modal-reserv">
  					<div class="modal-content">
    					<span class="close">&times;</span>
    					<h2>Avant de réserver... connectez-vous !</h2>
    						<a class="text-decoration-none text-white" href="cnx-user/cnx.php" target="_blank"><button class="btn btn-primary">Connexion</button></a>
						<h2>Pas de compte ?</h2>
							<a class="text-decoration-none text-white" href="register/register.php" target="_blank"><button class="btn btn-primary">Inscription</button></a>
  					</div>
				</div>
                    </div>
					<div class="btn-espace-user">
					    <button class="btn btn-primary cnx-btn"><a class="text-white text-decoration-none" href="cnx-user/cnx.php">Connexion</a></button>
						<button class="btn btn-primary register-btn"><a class="text-white text-decoration-none" href="register/register.php">Inscription</a></button>
                    </div>
				</div>
			</nav>
		</header>
		<main role="main">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="first-slide" src="img/slider/01.jpg" alt="Slider #1">
						<div class="container">
							<div class="carousel-caption text-left">
								<h1>Bienvenue sur le site du Quai Antique</h1>
								<p>
									Restaurant d'expériences gastronomiques à Chambéry
								</p>
							<a class="text-decoration-none text-white" href="carte/notre_carte.php">
								<button class="btn btn-primary">Notre carte</a>
							</button>
							</div>
						</div>
					</div>
				</div>

		<section class="section">
			<h2 class="text-center">Notre carte</h2>
		</section>
			<div class="container notre-carte">
			<div class="container text-muted">
			<div class="jumbotron jumbotron-fluid">
  				<div class="container">
				  <img class="img-card-page" src="img/cartes/presentation.jpg">
    			<p class="lead">Vous voulez qu'on vous donne envie de venir manger chez nous ? Et bien cliquez sur le bouton pour découvrir notre carte !</p>
				<div class="text-center">
					<a class="text-white text-decoration-none" href="carte/notre_carte.php" target="_blank"><button class="btn btn-primary">La découvrir</a></button>
				</div>
  			</div>
		</div>
			<!-- Galerie -->
			<section class="section">
				<h2 class="text-center">Notre galerie</h2>
			</section>
			<p class="text-center">Quelques photos des plats préparés par le chef Michant :</p>
			<div class="gallerie">
				<div class="item item-1">
					<p>Poulet & nouille</p>
					<button class="btn btn-primary">Recette</button>
				</div>
				<div class="item item-2">
					<p>Homard grillé au fromage</p>
					<button class="btn btn-primary">Recette</button>
				</div>
				<div class="item item-3">
					<p>Magret de canard aux patates douces et cacao</p>
					<button class="btn btn-primary">Recette</button>
				</div>
				<div class="item item-4">
					<p>Foie gras aux pommes caramélisées</p>
					<button class="btn btn-primary">Recette</button>
				</div>
				<div class="item item-5">
					<p>écrasé de pomme de terre aux truffe</p>
					<button class="btn btn-primary">Recette</button>
				</div>
			</div>

		<!-- Partie contact -->
<section class="section">
	<h2 class="text-center">Nous contacter</h2>
</section>
	<div class="contact">
		<h2 class="subtitle-contact">Nos informations</h2>
	<div class="contact-info">
		<div class="item">
			<i class="bi bi-geo-alt"></i>
				Quai Antique, Chambéry 73000
		</div>
		<div class="item">
			<i class="bi bi-telephone"></i>
				04.55.32.11.56
		</div>
			<div class="item">
				<i class="bi bi-envelope-fill"></i>
					contact@quaiantique.fr
			</div>
		</div>
	<form action="contact/envoi.php" method="POST" class="contact-form">
		<h2 class="subtitle-contact">Nous écrire</h2>
		<input type="text" name="nom" class="textb" placeholder="Votre nom">
		<input type="email" name="email" class="textb" placeholder="Votre adresse email">
		<textarea name="message" placeholder="Votre message"></textarea>
		<input type="submit" name="envoi" class="btn-contact-envoi" value='Envoyer'>
	</form>
</div>
</div>
	<!-- FOOTER -->
	<footer id="Footer" class="footer font-small stylish-color-dark pt-4 full-width-footer">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<!-- Content -->
				<h4 class="logo-footer">
					Quai Antique
				</h4>
				<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
				<p>
					Quai Antique est un restaurant d'expériences gastronomiques situé à Chambéry(73), venez goûter les plats du chef Michat !
				</p>
			</div>
			<hr class="clearfix w-100 d-md-none">
			<div id="link10" class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
				<ul class="horaires text-uppercase font-weight-bold">
					Nos horaires :
				</ul>
				<li class="day-footer">Lundi : 12h00 - 14h00 & 19h00 - 22H00</li>
				<li class="day-footer">Mardi : 12h00 - 14h00 & 19h00 - 22H00</li>
				<li class="day-footer">Mercredi : Fermé</li>
				<li class="day-footer">Jeudi : 12h00 - 14h00 & 19h00 - 22H00</li>
				<li class="day-footer">Vendredi : 12h00 - 14h00 & 19h00 - 22H00</li>
				<li class="day-footer">Samedi : Midi Fermé & 19h00 - 22H00</li>
				<li class="day-footer">Dimanche : 12h00 - 14h00 & Soir fermé</li>
			</div>
			<hr class="clearfix w-100 d-md-none">
			<div id="link10" class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
				<h6 class="text-uppercase font-weight-bold">
					Nos derniers plats mis en ligne
				</h6>
				<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
				<p>
					<a class="text-decoration-none" href="#!">#</a>
				</p>
				<p>
					<a class="text-decoration-none" href="#!">#</a>
				</p>
				<p>
					<a class="text-decoration-none" href="#!">#</a>
				</p>
				<p>
					<a class="text-decoration-none" href="#!">#</a>
				</p>
			</div>
			<hr class="clearfix w-100 d-md-none">
			<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
				<h6 class="text-uppercase font-weight-bold">
					Nos informations de contact :
				</h6>
				<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<p>
					<i class="bi bi-house-door-fill"></i>
					 Chambéry(73)
				</p>
				<p>
					<i class="bi bi-envelope-at-fill"></i>
					contact@quaiantique.fr
				</p>
				<p>
					<i class="bi bi-telephone-fill"></i>
					04.55.32.11.56
				</p>
			</div>
		</div>
	</div>
	<hr>
	<!-- Copyright -->
	<div  style="background-color:#b3b3cc;" class="footer-copyright text-center py-3">
		Copyright© <?php echo date('Y') ?>: Quai Antique tout droits réservés
	</div>
</footer>
</main>
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script>
</script>
