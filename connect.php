<?php

function connect()
{

    $host = "localhost"; // "localhost:3308"; en cas de soucis de ports, l'argument de droite est le port.
    $base = "utilisateurs";  
    $login = "root";
    $mdp = "";


    try                                                                                    // Ce fichier concerne uniquement la connexion a la base de données, j'ai utilisé try catch pour référencer certaines erreurs
    {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $mdp); // rien de compliqué ici, il suffit de mettre les informations au bon endroit; nom de l'hote, encodage, nom de la DB, identifiants...
        return $db;
    } 
    catch (exception $e)   // le cas d'erreur
    {
        echo 'Erreur : ' . $e->getMessage() . "<br>";  // evoie message si erreur il y a.
        die('connexion au serveur impossible');
    }
};


?>