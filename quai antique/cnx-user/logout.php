<?php
session_start();
$cnxUser = "cnx.php";
echo $email;
session_destroy();

if(!$email)
{
    header("Location: $cnxUser");
    if(header("Location: $cnxUser"))
    {
        echo "Déconnexion réussie !";
    }
}
else
{
    echo "Déconnexion non réussie !";
}