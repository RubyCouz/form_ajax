<?php



require 'connect.php';


$char_valid = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ�?ÀÂÄÃÅÇÉÈÊË�?ÌÎ�?ÑÓÒÔÖÕÚÙÛÜ�?ŸÆŒ\-\s]*$/';                  // déclaration d'une regex qui vise la chaine de caractères 'basique'.
$mail_valid = '/^([A-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\@[éA-Za-z0-9_-]+[.]*[éA-Za-z0-9_-]*\.[a-zA-Z]{2,4})*$/';      // regex spécialement pour le champ mail.


$tab_erreurs = array();  //ça c'est $tab_erreurs, (on le retrouve sur la vue) qui se charge d'afficher les erreurs.
$pseudo = "";   // j'ai du déclarer $pseudo a cause d'une erreur qui se produisait lorsqu'aucune valeur n'etait entrée.


$db = connect(); // le retour de la fonction 'connect();' est stocké dans une variable nommée $db







if(isset($_POST['login'])){$pseudo = htmlspecialchars($_POST['login']);} // j'effectue une recherche grace au login dans la base de données, je m'assure qu'il est donc un minimum sécurisé grace a 'htmlspecialchars' (Convertit les caractères spéciaux en entités HTML) 




$sql = "SELECT pass, pseudo from membres WHERE pseudo = :pseudo";  // Dans le where "pseudo = :pseudo", une variable contenant le pseudo aurait aussi l'affaire, $_POST['login'] aurait aussi fait l'affaire.

$requete = $db->prepare($sql);
$requete->execute(array(':pseudo' => $pseudo));


$retour = $requete->fetch(); // cette étape peut différer en fonction des besoins, on peut mettre "while($ligne = $requete->fetch)" OU $ligne =$requete->fetchAll(); OU $ligne = $requete->fetch(PDO::FETCH_OBJ)

// selectionne le mot de passe WHERE login, en gros recherche le mot de passe la ou il y a le login pour voir si ça correspond ..

// password_verify($chaine_saisie_en_clair, $hash_stocke_en_bdd);

// $password_hash = password_hash($mon_mot_de_passe, PASSWORD_DEFAULT); ----- PASSWORD_DEFAULT correspond au cryptage, cet argument est obligatoire (même si il y'a default dedans..)

// je peux traiter $retour comme un tableau, a priori ses index seront le nom des colonnes dans la DB  var_dump($retour['pseudo']); ......  ;)







if(isset($_POST['submit']))                                      // on vérifie encore la présence du submit.
{

   if(!empty($_POST['login']) && isset($_POST['login']))          //on vérifie la présence de 'login'
   {
       

       if(preg_match($char_valid, $_POST['login']))               // comparaison de login avec la regex déclarée plus haut.
       {
        if(isset($_POST['login'])){$pseudo_bd = htmlspecialchars($_POST['login']);}  // j'ai crée une deuxieme variable pseudo mais celle ci ne s'initialise qu'en cas de saisie correcte
       }
       else 
       {
           $tab_erreurs['login'] = 'Saisie incorrecte';
       }

       if($_POST['login'] === $retour['pseudo'])                  //cette condition sert a vérifier que le pseudo entré par l'utilisateur n'est pas déjà entré en base de données..
       {
        $tab_erreurs['login'] = "Ce pseudo existe déjà.";
       }


   }
   else
   {
      $tab_erreurs['login'] = "Vous devez saisir un login. ";
   }

 //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

   if(!empty($_POST['mdp']) && isset($_POST['mdp']))    // cette section correspond a la vérification du mot de passe 
   {
       

       if(preg_match($char_valid, $_POST['mdp']))   // vérifiaction avec la regex
       {
        
       }
       else 
       {
           $tab_erreurs['mdp'] = 'Saisie incorrecte'; // affichage de l'erreur ..
       }

   }
   else
   {
      $tab_erreurs['mdp'] = "Vous devez saisir un mot de passe. "; // cas ou le champ est vide..
   }

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

                                                        // ici c'est la vérif de la confirmation du mot de passe.

   if(!empty($_POST['mdp_bis']) && isset($_POST['mdp_bis'])) 
   {
       

       if(preg_match($char_valid, $_POST['mdp_bis']))
       {
           if($_POST['mdp'] !== $_POST['mdp_bis'])      //on vérifie bien évidemment que les deux mot de passes entrés par l'utilisateur sont bien les mêmes
           {
            $tab_erreurs['mdp_bis'] = 'Erreur, retapez le mot de passe entré au-dessus.';
           }

           if(isset($_POST['mdp_bis'])){$mdp = htmlspecialchars($_POST['mdp_bis']);}  // c'est celui ci que j'ai choisi de stocker en base de données en cas de création de compte, on le passe donc en htmlspecialchars

       }
       else 
       {
           $tab_erreurs['mdp_bis'] = 'Saisie incorrecte';
       }

   }
   else
   {
      $tab_erreurs['mdp_bis'] = "Re-saisir un mot de passe. ";
   }

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                       //Vérification du champ email...

   if(!empty($_POST['email']) && isset($_POST['email']))
   {
       

       if(preg_match($mail_valid, $_POST['email']))
       {
        if(isset($_POST['email'])){$email = htmlspecialchars($_POST['email']);}      
       }
       else 
       {
           $tab_erreurs['email'] = 'Saisie mail incorrecte';
       }

       if($_POST['email'] === $retour['email'])                  //cette condition sert a vérifier que le mail entré par l'utilisateur n'est pas déjà entré en base de données..
       {
        $tab_erreurs['email'] = "Cette adresse mail est déjà utilisée";
       }

   }
   else
   {
      $tab_erreurs['email'] = "Vous devez saisir une adresse mail. ";
   }

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------





  isset($mdp) ? $pass_hache = password_hash($mdp, PASSWORD_DEFAULT) : null ;         // $password_hash = password_hash($mon_mot_de_passe, PASSWORD_DEFAULT); ----- PASSWORD_DEFAULT correspond au cryptage, cet argument est obligatoire (même si il y'a default dedans..)

  if(count($tab_erreurs)===0)  // on revérifie qu'il n'y a pas d'erreurs juste au cas ou
{
  try{

     $insert = "INSERT INTO membres(pseudo, pass, email, date_ins) VALUES(:insert_pseudo, :insert_pass, :insert_email, CURDATE())"; //entrée des valeurs dans la base de données


     $req = $db->prepare($insert);          //préparation de la requête (les requêtes préparées sont plus safe !)


    $req->bindValue(':insert_pseudo', $pseudo_bd);   // NOTE :si je mets les $_POST dans des variables et qu'elles sont vides j'aurai une erreur, si j'envoie direct le $_POST au lieu de la variable et que c'est vide, pas d'erreurs (a confirmer)
    $req->bindValue(':insert_pass', $pass_hache);
    $req->bindValue(':insert_email', $email);



    $req->execute();
    $req->closeCursor();

  }
  catch(exception $e)
  {
    echo 'Erreur : '. $e->getMessage() .'<br>';
    die('End...');
  }
  }
else
{
    $tab_erreurs['saisies'] = "Une des saisies est incorrecte ou inexistante, vous devez remplir chaque champ correctement"; // dans le cas ou $tab_erreurs ne vaut pas 0, un petit message.
}



}  

/* Quelques sources utiles 
  https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/917948-tp-creez-un-espace-membres

*/
?>