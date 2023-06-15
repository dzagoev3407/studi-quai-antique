/* test */
/*
console.log('Test');
*/


/* Modal connexion avant réservation */

var modal_cnx = document.getElementById("modal-cnx-reserv");
var btn_reservation = document.getElementById("btn-reserv");
var close = document.getElementsByClassName("close")[0];

btn_reservation.onclick = function() {
  modal_cnx.style.display = "block";
}

close.onclick = function() {
  modal_cnx.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal_cnx) {
    modal_cnx.style.display = "none";
  }
}

/* Modal de confirmation */

// Afficher la modal de confirmation
function showConfirmationModal() {
  var modal = document.getElementById("confirmationModal");
  modal.style.display = "block";
}

function hideConfirmationModal() {
  var modal = document.getElementById("confirmationModal");
  modal.style.display = "none";
}

// Ajouter un écouteur d'événement au bouton de confirmation
document.getElementById("confirmButton").addEventListener("click", hideConfirmationModal);

// Exemple d'utilisation : appeler showConfirmationModal() pour afficher la modal de confirmation
showConfirmationModal();

/* Bouton pour afficher le texte lorsqu'il est coupé sur la partie notre carte du site */

function showFullText(cardId) {
  var cardText = document.getElementById(cardId + "-text-plat");
  var showButton = document.getElementById(cardId + "-show-button");
  var hideButton = document.getElementById(cardId + "-hide-button");
  cardText.classList.remove("card-text-plat");
  showButton.style.display = "none";
  hideButton.style.display = "inline";
}

function hideFullText(cardId) {
  var cardText = document.getElementById(cardId + "-text-plat");
  var showButton = document.getElementById(cardId + "-show-button");
  var hideButton = document.getElementById(cardId + "-hide-button");
  cardText.classList.add("card-text-plat");
  showButton.style.display = "inline";
  hideButton.style.display = "none";
}

/* Popup de réservation */

function popupReserv() {
  var popup = document.getElementById("popup-reserv");
  popup.classList.toggle("show");
}

/* Pour fermer la popup de bienvenue */

function closeWelcomePopup() {
  var overlay = document.getElementById('popup-welcome');
  overlay.style.display = 'none';
}

/* Modification des infos utilisateur sur l'espace client */

// Vérifie si des informations utilisateur sont déjà enregistrées dans le localStorage
var storedName = localStorage.getItem("name_info");
var storedEmail = localStorage.getItem("email_info");
var storedPhone = localStorage.getItem("phone_info");
var storedCity = localStorage.getItem("city_info");

// Affiche les informations enregistrées s'il y en a
if (storedName) document.getElementById("name_info").textContent = storedName;
if (storedEmail) document.getElementById("email_info").textContent = storedEmail;
if (storedPhone) document.getElementById("phone_info").textContent = storedPhone;
if (storedCity) document.getElementById("city_info").textContent = storedCity;

function modifyInfos() {

  var name = prompt("Entrez votre nom", storedName || "");
  var email = prompt("Entrez votre adresse e-mail", storedEmail || "");
  var phone = prompt("Entrez votre numéro de téléphone", storedPhone || "");
  var city = prompt("Entrez votre ville", storedCity || "");

  // Ceci enregistre les informations saisies
  localStorage.setItem("name_info", name);
  localStorage.setItem("email_info", email);
  localStorage.setItem("phone_info", phone);
  localStorage.setItem("city_info", city);

  document.getElementById("name_info").textContent = name;
  document.getElementById("email_info").textContent = email;
  document.getElementById("phone_info").textContent = phone;
  document.getElementById("city_info").textContent = city;
}