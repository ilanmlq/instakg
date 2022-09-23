<?php 

//<div class="success">Successful operation message</div>

if (isset($_SESSION['errorRegister'])) {
    echo "<div class='error'><ul>$_SESSION[errorRegister]</ul></div>";
}

?>

<form action="index.php?url=auth&action=validRegister" method="POST">
    <div id="wrapper">
        <div class="main-content">
            <div class="logo">
                Instakg
            </div>
            <div class="l-part">
                <input type="text" placeholder="pseudo" name="pseudo" class="input-1" />

                <input type="text" placeholder="email" name="email" class="input-1" />
                <div class="overlap-text">
                    <input type="password" placeholder="mot de passe" name="mdpHash" class="input-2" />
                </div>
                <div class="overlap-text">
                    <input type="password" name="mdpHashRepeat" placeholder="confirmer mot de passe" class="input-2" />
                </div>
                <input type="button" value="Créer" class="btn" />
            </div>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Vous avez déjà un compte ?<a href="index.php?url=auth&action=login"> Connecter</a>
            </div>
        </div>
    </div>
</form>