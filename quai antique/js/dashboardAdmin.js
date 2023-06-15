/* test */
/*
console.log('Test');
*/

function popUpClient()
{
    var tableClient = document.getElementById("table-client");
    tableClient.style.display = "block";
}

function fermerPopUpClient()
{
    var closePopUpClient = document.getElementById("table-client");
    closePopUpClient.style.display = "none";
} // Fermer la pop up TABLEAU CLIENT

function popUpReservation()
{
    var tableReservation = document.getElementById("table-reservation");
    tableReservation.style.display = "block";
}

function fermerPopUpReservation()
{
    var closePopUpReservation = document.getElementById("table-reservation");
    closePopUpReservation.style.display = "none";
} // Fermer la pop up TABLEAU RESERVATION

function popupAdmin()
{
    var tableAdmin = document.getElementById("table-admin");
    tableAdmin.style.display = "block";
}

function fermerPopUpAdmin()
{
    var closePopUpAdmin = document.getElementById("table-admin");
    closePopUpAdmin.style.display = "none";
} // Fermer la pop up TABLEAU ADMIN 