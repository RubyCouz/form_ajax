<?php
require 'connect.php';  //Petit appel de la page qui contient le nécéssaire de connexion a la bade de données
$char_valid = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-\s]*$/';                 // déclaration d'une regex qui vise la chaine de caractères 'basique'.
$mail_valid = '/^([A-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\@[éA-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\.[a-zA-Z]{2,4})*$/';    // regex spécialement pour le champ mail.
$tab_erreurs = array();  //ça c'est $tab_erreurs, (on le retrouve sur la vue) qui se charge d'afficher les erreurs.
$pseudo = "";  // j'ai du déclarer $pseudo a cause d'une erreur qui se produisait lorsqu'aucune valeur n'etait entrée.
$db = connect(); // le retour de la fonction 'connect();' est stocké dans une variable nommée $db

if (isset($_POST['login'])) {
    $pseudo = htmlspecialchars($_POST['login']); // j'effectue une recherche grace au login dans la base de données, je m'assure qu'il est donc un minimum sécurisé grace a 'htmlspecialchars' (Convertit les caractères spéciaux en entités HTML) 
}

$sql = "SELECT pass, pseudo, id from membres WHERE pseudo = :pseudo";  // Dans le where "pseudo = :pseudo", une variable contenant le pseudo aurait aussi l'affaire, $_POST['login'] aurait aussi fait l'affaire.
$requete = $db->prepare($sql);
$requete->execute(array(':pseudo' => $pseudo));
$retour = $requete->fetch(); // cette étape peut différer en fonction des besoins, on peut mettre "while($ligne = $requete->fetch)" OU $ligne =$requete->fetchAll(); OU $ligne = $requete->fetch(PDO::FETCH_OBJ)

// selectionne le mot de passe WHERE login, en gros recherche le mot de passe la ou il y a le login pour voir si ça correspond ..

// password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd);

// $password_hash = password_hash($mon_mot_de_passe, PASSWORD_DEFAULT); ----- PASSWORD_DEFAULT correspond au cryptage, cet argument est obligatoire (même si il y'a default dedans..)

// je peux traiter $retour comme un tableau, a priori ses index seront le nom des colonnes dans la DB  var_dump($retour['pseudo']); ......  ;)

// il est aussi possible (et peut être préférable) de se connecter grace a l'adresse mail. Afin de se servir du pseudo pour permettre aux utilisateurs de s'identifier entre eux
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['submit'])) {                                           // on vérifie encore la présence du submit.
    if (!empty($_POST['login'])) {           //on vérifie la présence de 'login'
        if (preg_match($char_valid, $_POST['login'])) { } else {        // comparaison de login avec la regex déclarée plus haut.
            $tab_erreurs['login'] = 'Saisie incorrecte';             //en cas d'erreurs.. c'est ici que $tab_erreurs intervient
        }
    } else {
        $tab_erreurs['login'] = "Vous devez saisir un login. ";    //dans le cas ou la valeur de login est absente, on affiche un petit message sympa.
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    //ce qu'il se passe dans les prochaines lignes correspond exactement aux lignes du dessus (délimités avec les tirets) les mêmes commentaires s'y appliquent.
    if (!empty($_POST['mdp'])) {
        if (preg_match($char_valid, $_POST['mdp'])) { } else {
            $tab_erreurs['mdp'] = 'Saisie incorrecte';
        }
    } else {
        $tab_erreurs['mdp'] = "Vous devez saisir un mot de passe. ";
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $isPasswordCorrect = password_verify($_POST['mdp'], $retour['pass']);  // password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd); .... $isPasswordCorrect se comporte comme un booléen ici, il prend password_vérify, c'est soit vrai soit faux.
    if (!$retour) // donc si la requête n'a pas trouvé de les identifiants en DB, c'est pas bon
    {
        $tab_erreurs['saisie'] = 'Attention ! Identifiant ou mot de passe incorrect !'; //en fonction de la condition, $tab_erreurs est toujours là pour afficher son petit message.
    } 
    else 
    {
        if ($isPasswordCorrect) // c'est ici qu'on vérifie si $isPasswordCorrect est vrai ou faux
        {
            session_start();    // si c'est vrai ... une session s'ouvre
            $_SESSION['id'] = $retour['id'];  // dans cette session, on stocke l'id c'est la position de l'utilisateur en base de données (c'est facultatif)
            $_SESSION['pseudo'] = $pseudo;   // et le pseudo pour informer l'utilisateur qu'il est en ligne
            echo 'Vous êtes connecté !'; // 
            header('location: pageExemple.php'); // en cas de réussite, on est orientés vers une autre page, une sorte d'accueil. (l'echo au dessus ne sert donc a rien pour l'instant)
        } 
        else 
        {
            $tab_erreurs['saisie'] = 'Attention ! Identifiant ou mot de passe incorrect !'; //si le password n'est pas bon, $tab_erreurs se charge d'en informer l'utilisateur
        }
    }
}