<?php

if (isset($_SESSION['errorLogin'])) {
    echo "<div class='alert alert-danger' role='alert'><ul>$_SESSION[errorLogin]</ul></div>";
}

?>

<form action="index.php?url=auth&action=validLogin" method="POST">
    <div id="wrapper">
        <div class="main-content">
            <div class="logo">
                    Instakg
            </div>
            <div class="l-part">
                <input type="text" placeholder="email" class="input-1" />
                <div class="overlap-text">
                    <input type="password" placeholder="mot de passe" class="input-2" />
                </div>
                <input type="button" value="Se connecter" class="btn" />
            </div>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Vous n'avez pas de compte ?<a href="index.php?url=auth&action=register"> Créer</a>
            </div>
        </div>
    </div>
</form>