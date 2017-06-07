<nav id="navBar" class="blue-grey darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Chalet Yamilé</a>
        <?php
        //Si il est admin (toujours un icone si admin)
        if($_SESSION['admin'] == 1) {
            ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="indexCalendar.php"><i class="material-icons left">today</i>Calendrier</a></li>
            </ul>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="acceptReservation.php"><i class="material-icons left">vpn_key</i>Plages horaires demandées</a></li>
            </ul>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="message.php"><i class="material-icons left">email</i>Message</a></li>
            </ul>
            <?php
        }
            //Si il est connecté
            if($_SESSION['connected'] == 1)
            {
                //Si il n'est pas admin
                if($_SESSION['admin'] == 0) {
                    ?>
                    <ul class="right hide-on-med-and-down waves-effect">
                        <li><a href="reservation.php">Réserver une plage horaire</a></li>
                    </ul>
                    <ul class="right hide-on-med-and-down waves-effect">
                        <li><a href="sendMessage.php?type=message">Envoyer un message</a></li>
                    </ul>
                    <?php
                }
                    ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="presentation.php">Présentation du chalet</a></li>
            </ul>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="profile.php">Profil</a></li>
            </ul>
            <?php
        }
        //S'il n'est pas connecté, il est impossible d'utiliser les boutons mais ils sont présent avec un petit logo de cadena
        else
        {
        ?>
        <ul class="right hide-on-med-and-down">
            <li><a href="#"> <i class="material-icons left">lock_outline</i>Réserver une plage horaire</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="#"> <i class="material-icons left">lock_outline</i>Présentation du chalet</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="#"> <i class="material-icons left">lock_outline</i>Profil</a></li>
        </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons left">lock_outline</i>Message</a></li>
            </ul>
        <?php
        }
        //S'il est connecté ajoute le bouton deconnexion
        if($_SESSION['connected'] == 1)
        {
            ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="disconnexion.php">Déconnexion</a></li>
            </ul>

            <?php
        }
        //Sinon affiche les bouton connexion et inscription
        else
        {
        ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="inscription.php?type=inscription">Inscription</a></li>
            </ul>
        <?php
        }
        ?>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
    <script>
        $(".button-collapse").sideNav();
    </script>
</nav>