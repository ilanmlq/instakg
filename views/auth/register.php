<?php 
	
if (isset($_SESSION['errorRegister'])) {
    echo "<div class='error'><ul>$_SESSION[errorRegister]</ul></div>";
}

?>

<form action="index.php?url=auth&action=validRegister" method="POST">
    <div class="container-auth">
        <h1>S'inscrire</h1>
        <p>Veuillez remplir toutes les données pour pouvoir s'inscrire.</p>

        <hr>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Votre Email" name="email" value="">

        <label for="username"><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Votre nom" name="username" value="">

        <label for="pwd"><b>Mot de passe</b></label>
        <input type="password" placeholder="Votre mot de passe" name="pwd">

        <label for="pwdRepeat"><b>Votre mot de passe à nouveau</b></label>
        <input type="password" placeholder="Confirmer votre mot de passe" name="pwdRepeat">
        
        <hr>

        <p>En créant un compte vous acceptez <a href="#">nos conditions</a>.</p>

        <button type="submit" class="registerbtn">S'inscrire</button>
    </div>

    <div class="container signin">
        <p>Déjà un compte ? <a href="index.php?url=auth&action=login">Se connecter</a>.</p>
    </div>
</form>