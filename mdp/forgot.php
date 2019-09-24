<?php include 'scriptForgot.php' ?>


<?php

if(isset($_POST['submit']) && count($erreur) === 0)
{
    ?>
    <?php  header('location: newMdp.php') ?>
    <?php }
else { ?>



<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <meta name="author" content="site">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="">
</head>
<body>
<?php
include '../fonctions/header_navbar.php';
?>

<h1>Mot de passe oublié ? Entrez l'adresse mail associée a votre compte afin de recevoir un code provisoire.<h1>
<form action='' method='post'>

<label for="mail">Adresse mail:</label><input type='text' name='for_email'/>
<p><?= isset($erreur['mail']) ? $erreur['mail'] : '' ?></p>
<input type='submit' name='submit' value='Submit'/>



</form>
</body>
</html>


<?php 


}

?>