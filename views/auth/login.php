<?php 

if (isset($_SESSION['errorLogin'])) {
    echo "<div class='alert alert-danger' role='alert'>$_SESSION[errorLogin]</div>";
}

?>

<form action="index.php?url=auth&action=validLogin" method="POST">
    <div class="container-auth">
        <h1>Se connecter</h1>
        <p>Veuillez remplir toutes les données pour pouvoir se connecter.</p>

        <hr>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Votre Email" name="email" value="">

        <label for="pwd"><b>Mot de passe</b></label>
        <input type="password" placeholder="Votre mot de passe" name="pwd">

        <hr>

        <button type="submit" class="loginBtn">Se connecter</button>
    </div>

    <div class="container signin">
        <p>Pas de compte ? <a href="index.php?url=auth&action=register">S'inscrire</a>.</p>
    </div>
</form>