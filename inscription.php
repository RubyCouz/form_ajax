<?php
include 'scriptInscription.php';
include 'fonctions/header_navbar.php';
// CETTE PAGE FONCTIONNE COMME LA PAGE DE CONNEXION (index.php)
if (isset($_POST['submit']) && count($tab_erreurs) === 0)
{
 ?>
    <p>Inscription effectuée !!!</p>
<?php
}
else
{
    ?>
    <div class="fond">
        <div class=" offset-2 col-4  loginSpace">
            <div class="offset-1">
                <form method="post" action="" id="formulaire" name="form" enctype="multipart/form-data">
                    <fieldset>
                        <h3 class="couleurNom">Inscription</h3>
                        <!-- -------------------------------------------------------------------------------------- -->
                        <label for="log" class="tailleNom couleurNom"> Nom de compte : </label>
                        <div class="form-group row Lines">
                            <input type="text" name="login" id="login" class="form-control col-8" value="<?= isset($_POST['login']) ? $_POST['login'] : '' ?>">
                            &nbsp;
                            <span id="nomNull" class="nomError redim ">Saisie non valide.</span>
                            <span id="nomMiss" class="nomError redim ">Saisie manquante.</span>
                            <span id="nomSucess" class="nomValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset"><?= isset($tab_erreurs['login']) ? $tab_erreurs['login'] : '' ?></p>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
                        <label for="md" class="tailleNom couleurNom"> Mot de passe : </label>
                        <div class="form-group row Lines">
                            <input type="password" name="mdp" id="mdp" class="form-control col-8" value="<?= isset($_POST['mdp']) ? $_POST['mdp'] : '' ?>">   
                            &nbsp;
                            <span id="mdpNull" class="mdpError redim ">Saisie non valide.</span>
                            <span id="mdpMiss" class="mdpError redim ">Saisie manquante.</span>
                            <span id="mdpSucess" class="mdpValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset"><?= isset($tab_erreurs['mdp']) ? $tab_erreurs['mdp'] : '' ?></p>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
                        <label for="md_bis" class="tailleNom couleurNom"> Retapez votre mot de passe : </label>
                        <div class="form-group row Lines">
                            <input type="password" name="mdp_bis" id="mdp_bis" class="form-control col-8" value="<?php isset($_POST['mdp_bis']) ? $_POST['mdp_bis'] : '' ?>">   
                            &nbsp;
                            <span id="mdp_bisNull" class="mdp_bisError redim ">Saisie non valide.</span>
                            <span id="mdp_bisMiss" class="mdp_bisError redim ">Saisie manquante.</span>
                            <span id="mdp_bisSucess" class="mdp_bisValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset"><?= isset($tab_erreurs['mdp_bis']) ? $tab_erreurs['mdp_bis'] : '' ?></p>
                        <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
                        <label for="md_bis" class="tailleNom couleurNom"> Adresse mail : </label>
                        <div class="form-group row Lines">
                            <input type="text" name="email" id="email" class="form-control col-8" value="<?php isset($_POST['email']) ? $_POST['email'] : '' ?>">   
                            &nbsp;
                            <span id="emailNull" class="emailError redim ">Saisie non valide.</span>
                            <span id="emailMiss" class="emailError redim ">Saisie manquante.</span>
                            <span id="emailSucess" class="emailValide redim">Champ valide.</span>
                        </div>
                        <p class="messagePhp couleurNom offset"><?= isset($tab_erreurs['email']) ? $tab_erreurs['email'] : '' ?></p>
                        <input type="submit" name="submit" value="Envoyer" class="btn btn-primary ">
                        <p class="couleurNom offset"><?= isset($tab_erreurs['saisies']) ? $tab_erreurs['saisies'] : '' ?></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>  
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="assets/scriptInscription.js"></script>
</body>
</html>
