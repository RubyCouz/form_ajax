<?php require '../connect.php';




$db = connect();
$erreur = array();


if (isset($_POST['submit'])) {



    $sql = "SELECT * FROM mdp";

    $req = $db->prepare($sql);

    $req->execute();

    $row = $req->fetch(PDO::FETCH_OBJ);

    //normalament l'utilisateur arrive ici lorsqu'il est redirigé par mail --> il faut qu'il puisse entrer le hache qu'il a reçu (dans le mail) si c'est bon, il peut changer son mot de passe.

    $sRand = $row->sess;


    if (isset($_POST['code'])) 
    {


        $code = $_POST['code'];

        if ($code == $sRand) 
        {
            
                        
             header('Location: setPass.php');
             
            
        }
         else 
         {
            $erreur['code'] = "Le code que vous avez entré est érroné. Merci d'entrer le code reçu par e-mail.";
         }
    } 
    else 
    {
        $erreur['code'] = "Vous devez entrer un code pour récupérer votre mot de passe.";
    }







    

   



}


?>