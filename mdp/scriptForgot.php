<?php



require '../connect.php';


$db = connect();
$erreur = array();

if (isset($_POST['submit'])) {
    $mail = htmlspecialchars($_POST['for_email']);

    $sql = "SELECT pass, pseudo, email from membres WHERE email = :email";

    $requete = $db->prepare($sql);
    $requete->execute(array(':email' => $mail));

    $retour = $requete->fetch();


    $password = $retour['pass'];
    $mail_id = $retour['email'];



    if ($mail == $mail_id) {
        try {

            $random = rand();
            $sRand = password_hash($random, PASSWORD_DEFAULT);

            $insert = "INSERT INTO mdp(sess, userID) VALUES(:sess, :mail)";

            $req = $db->prepare($insert);

            $req->bindValue(':sess', $sRand);
            $req->bindValue(':mail', $mail_id);

            $req->execute();
            $req->closeCursor();
        } catch (exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br>';
            die('End...');
        }






      
        $to = $mail_id;
        $objet = 'Password';
        $txt = 'http://localhost/Projet/Exercices/mdp-session(2)/mdp/newMdp.php


        Vous allez être redirigé vers un formulaire ou vous devrez entrer le mot de passe suivant : '.$sRand;
        $entete = "From : support@monSite.com";
        mail($to, $objet, $txt, $entete);
        // un header vers une page qui dit : "un mail vous a été envoyé ..."
        echo session_name();
    } else {
        $erreur['mail'] = "Saisie adresse mail incorrecte/absente";
    }
}
/*
else
{
    $erreur['mail'] = "Vous devez saisir une adresse mail";                    //CE MESSAGE APPARAITRA TANT QUE LE FORMULAIRE N'A PAS ETE VALIDE (else sur if isset$\post['submit'])
    
}
*/
