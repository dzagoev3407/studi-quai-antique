<?php
session_start();
$cnxAdmin = "../../cnx-admin.php";
echo $email;
session_destroy();

if(!$email)
{
    header("Location: $cnxAdmin");
    if(header("Location: $cnxAdmin"))
    {
        echo "Déconnexion réussie !";
    }
}
else
{
    echo "Déconnexion non réussie !";
}