<?php
include 'scriptLog.php'; // inclusion de la page qui contient le code de la validation  
//Ce qu'il se passe, en grosses lettres c'est que la condition vérifie l'envoi du formulaire et le nombre d'erreurs, si tout est bon le formulaire ne se 'relance' pas, ce qui permet de passer a la suite,
//  en effet ici en cas de réussite, il y'a non seulement un magnifique <p> inutile car on ne le voit pas, mais surtout un header qui se déclenche dans la page appellée grace a l'inclusion, sinon le formulaire se recharge en prenant soin d'afficher les erreurs
include 'fonctions/header_navbar.php';
?>
<?php
if (isset($_POST['submit']) && count($tab_erreurs) === 0) // cette condition sert au bon déroulement du comportement de la page : $_post sumbit vérifie le clic (il fonctionne grace a l'attribut name sur le input type submit)
{                                                           // en gros ça sert a vérifier si le formulaire a bien été envoyé afin de tester le reste du code, evidemment lors de la premiere le comportement est légèrement différent
    // le $tab_erreurs est là pour envoyer les différents messages d'erreur a l'envoi, mais il possède une double utilité, car on peut compter le nombre de messages stockés dans le tableau, si il y'en a plus de 0; c'est qu'il y'a une erreur.
    ?>                                                    
    <p> il n'y a pas d'erreurs ? On continue </p>
    <?php
}
else
{
    ?>
    <div class="fond">
        <div class=" offset-6 col-3  loginSpace">
            <div class="offset-1">
                <form method="post" action="" id="formulaire" name="form" enctype="multipart/form-data">
                    <fieldset>
                        <h3 class="couleurNom">Connexion (nom du site)</h3>    
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <label for="log" class="tailleNom couleurNom"> Nom de compte : </label>
                        <div class="form-group row Lines">
                            <input type="text" name="login" id="login" class="form-control col-7" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                            &nbsp;
                            <span id="nomNull" class="nomError redim ">Saisie non valide.</span>
                            <span id="nomMiss" class="nomError redim ">Saisie manquante.</span>   <?php //Les 3 span qui contienent Saisie non valide, Saisie manquante et champ valide ont leur affichage controlé avec le javascript et s'affichent tour a tour en fonction du cas rencontré               ?>
                            <span id="nomSucess" class="nomValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset">
                            <?= isset($tab_erreurs['login']) ? $tab_erreurs['login'] : '' ?>
                        </p>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <label for="md" class="tailleNom couleurNom"> Mot de passe : </label>
                        <div class="form-group row Lines">
                            <input type="password" name="mdp" id="mdp" class="form-control col-7" value="<?= isset($_POST['mdp']) ? $_POST['mdp'] : '' ?>">
                            &nbsp;
                            <span id="mdpNull" class="mdpError redim ">Saisie non valide.</span>
                            <span id="mdpMiss" class="mdpError redim ">Saisie manquante.</span>
                            <span id="mdpSucess" class="mdpValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset"><?= isset($tab_erreurs['mdp']) ? $tab_erreurs['mdp'] : '' ?></p>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <input type="submit" name="submit" value="Connexion" class="btn btn-primary ">&nbsp;<span class="couleurNom"> Pas de compte ? <a href='inscription.php' class="couleurNom styleLien"> Créer un compte </a></span>
                        <p class="couleurNom messageErr">
                            <?= isset($tab_erreurs['saisie']) ? $tab_erreurs['saisie'] : '' ?>
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" 
crossorigin="anonymous"></script>
<script src="assets/scripts.js"></script>
</body>
</html>