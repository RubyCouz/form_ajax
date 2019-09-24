<?php include 'script_setPass.php' ?>


<?php

if (isset($_POST['submit']) && count($erreur) === 0) {
    ?>
<?php echo "votre mot de passe a bien été changé";
      sleep(3);
      header('Location: ../index.php');
    ?>
<?php } else { ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>

<body>

<?php
include '../fonctions/header_navbar.php';
?>

    <form method="post" action="" id="formulaire" name="form" enctype="multipart/form-data">
<div class="logSpace col-4 offset-3">
    <fieldset>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <label for="md" class="tailleNom couleurNom"> Mot de passe : </label>
        <div class="form-group row Lines">

            <input type="password" name="mdp" id="mdp" class="form-control col-8" value="<?php if (isset($_POST['mdp'])) {
                                                                                                    echo $_POST['mdp'];
                                                                                                } ?>">

            &nbsp;

           
        </div>


        <p class="messagePhp couleurNom offset"><?= isset($erreur['mdp']) ? $erreur['mdp'] : '' ?></p>


        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <label for="md_bis" class="tailleNom couleurNom"> Retapez votre mot de passe : </label>
        <div class="form-group row Lines">

            <input type="password" name="mdp_bis" id="mdp_bis" class="form-control col-8" value="<?php if (isset($_POST['mdp_bis'])) {
                                                                                                            echo $_POST['mdp_bis'];
                                                                                                        } ?>">

            &nbsp;

         

        </div>


        <p class="messagePhp couleurNom offset"><?= isset($erreur['mdp_bis']) ? $erreur['mdp_bis'] : '' ?></p>


        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <input type="submit" name="submit" value="Envoyer" class="btn btn-primary ">
        <p class="couleurNom offset"><?= isset($erreur['saisies']) ? $erreur['saisies'] : '' ?></p>




        <fieldset>
        </div>
</form>


</body>

</html>





<?php
}
?>