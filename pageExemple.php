<?php

session_start();

if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) // verification de la connection, il ne faut pas oublier de l'inclure dans les pages qui nécéssitent d'être connecté
{
    ?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style_site.css">
    <title>Document</title>
</head>

<body>

<?php
include 'fonctions/header_navbar.php';
?>

<div class="dropdown">
 <img src="assets/images/magnifique.png" alt="Image de profil" width="70" height="70" class="avatar"> <span class ="pseudo"><?= $_SESSION['pseudo']?>&nbsp;</span>
    
    <div class="dropdown-content">
 <div class="desc"><a class="drop_item" href="#">Profil</a></div>
 <div class="desc"><a class="drop_item" href="fonctions/deconnection.php">Deconnexion</a></div>
 </div>
</div>
</div>

<!-- <div class="dropdown">
 <img src="assets/img/connect.png" alt="Image de profil" width="70" height="70"> <?= $_SESSION['login']?>
 <div class="dropdown-content">
 <div class="desc"><a class="drop_item" href="#">Profil</a></div>
 <div class="desc"><a class="drop_item" href="deconnexion.php">Deconnexion</a></div>
 </div>
</div>

-->









    <h1 class="offset-5 col-4">"Accueil"</h1>

    <div class="container">

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis congue non augue vel porttitor. In hac habitasse platea dictumst. Sed tincidunt elementum lacus quis semper. Pellentesque dolor metus, lacinia eu ex quis, pretium sodales elit. Morbi commodo nisl vel sagittis sodales. In malesuada posuere nisi, ut viverra arcu faucibus interdum. Nam id quam erat. Maecenas ex orci, consectetur eu tellus non, tincidunt rutrum neque. Quisque orci urna, ullamcorper at sodales eget, commodo quis augue. Vivamus nec commodo orci. Proin condimentum in libero et congue. Fusce non mattis arcu. Nullam nec nunc nec eros mattis ultrices sed sit amet enim. Suspendisse viverra erat lectus, eu feugiat tortor commodo nec. Duis odio sem, porttitor id ornare in, tincidunt eget augue.

        Ut nec hendrerit magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed semper ipsum in hendrerit euismod. Proin viverra, ante ac lacinia tristique, orci tellus sodales libero, vel iaculis augue ante sit amet tortor. Aliquam erat volutpat. Phasellus nec rutrum urna. Phasellus scelerisque metus vitae velit blandit, vel posuere lectus vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus laoreet in tortor at lacinia. Ut non facilisis erat. Nullam suscipit suscipit ligula et ullamcorper.
    </p>
</div>
</body>

</html>


<?php
} else {
    echo "Vous n'êtes pas/plus connecté, le contenu n'est pas accessible.";
}


?>