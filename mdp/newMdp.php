<?php include 'script_newMdp.php' ?>


<?php

if(isset($_POST['submit']) && count($erreur) === 0)
{
    ?>
    <?php //EN CAS DE SUCCES REDIRECTION VERS LA PAGE QUI PERMET D'ENTRER UN NOUVEAU MOT DE PASSE ?>
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

<h1>Entrez le code qui vous a été envoyé par mail afin de redéfinir votre mot de passe.<h1>
<form action='' method='post'>

<label for="mail">Code : </label><input type='text' name='code'/>
<p><?= isset($erreur['code']) ? $erreur['code'] : '' ?></p>
<input type='submit' name='submit' value='Submit'/>



</form>
</body>
</html>


<?php 


}

?>