<?php require '../connect.php';

$db = connect();

$erreur = array();


$char_valid = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-\s]*$/';  





$sql = "SELECT * FROM mdp";

$req = $db->prepare($sql);

$req->execute();

$row = $req->fetch(PDO::FETCH_OBJ);






if(isset($_POST['submit'])) // donc si il y a envoi formulaire
{


    if(isset($row->userID))
    {
    $mail = $row->userID;




    if(!empty($_POST['mdp']) && isset($_POST['mdp']))    // cette section correspond a la vérification du mot de passe 
    {
        
 
        if(preg_match($char_valid, $_POST['mdp']))   // vérifiaction avec la regex
        {
         
        }
        else 
        {
            $erreur['mdp'] = 'Saisie incorrecte'; // affichage de l'erreur ..
        }
 
    }
    else
    {
       $erreur['mdp'] = "Vous devez saisir un mot de passe. "; // cas ou le champ est vide..
    }
 
 //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
                                                         // ici c'est la vérif de la confirmation du mot de passe.
 
    if(!empty($_POST['mdp_bis']) && isset($_POST['mdp_bis'])) 
    {
        
 
        if(preg_match($char_valid, $_POST['mdp_bis']))
        {
            if($_POST['mdp'] !== $_POST['mdp_bis'])      //on vérifie bien évidemment que les deux mot de passes entrés par l'utilisateur sont bien les mêmes
            {
             $erreur['mdp_bis'] = 'Erreur, retapez le mot de passe entré au-dessus.';
            }
 
            if(isset($_POST['mdp_bis'])){$mdp = htmlspecialchars($_POST['mdp_bis']);}  // c'est celui ci que j'ai choisi de stocker en base de données en cas de création de compte, on le passe donc en htmlspecialchars
 
        }
        else 
        {
            $erreur['mdp_bis'] = 'Saisie incorrecte';
        }
 
    }
    else
    {
       $erreur['mdp_bis'] = "Re-saisir un mot de passe. ";
    }
 


    isset($mdp) ? $pass_hache = password_hash($mdp, PASSWORD_DEFAULT) :  null; 



$instru = "UPDATE membres SET pass = :pass WHERE email = :mail";

$requete = $db->prepare($instru);

$requete->execute(array(
    ':pass' => $pass_hache,
    ':mail' => $mail
));


$requete->closeCursor();






             $varSql = "DELETE FROM mdp";
             $db->exec($varSql);


             /*
                Il faudrait un message qui avertit l'utilisateur que son mot de passe a bien été changé
             */


}
else
{
    $erreur['saisies'] = "Vous n'avez probablement pas entré le code dans la page précédente, impossible de changer votre mot de passe, recommencez.";
}





}



?>