<nav class="blue-grey darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Chalet Yamilé</a>
        <?php
        if($_SESSION['admin'] == 1) {
            ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="indexCalendar.php"><i class="material-icons left">today</i>Calendrier</a></li>
            </ul>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="acceptReservation.php"><i class="material-icons left">vpn_key</i>Plages horaires demandées</a></li>
            </ul>
            <?php
        }
            if($_SESSION['connected'] == 1)
            {
                if($_SESSION['admin'] == 0) {
                    ?>

                    <ul class="right hide-on-med-and-down waves-effect">
                        <li><a href="reservation.php">Réserver une plage horaire</a></li>
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
            <li><a href="#"> <i class="material-icons left">lock_outline</i>Profile</a></li>
        </ul>
        <?php
        }
        ?>
        <ul class="right hide-on-med-and-down waves-effect">
            <li><a href="inscription.php?type=inscription">Inscription</a></li>
        </ul>
        <?php
        if($_SESSION['connected'] == 1)
        {
            ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="disconnexion.php">Déconnexion</a></li>
            </ul>

            <?php
        }
        else
        {
        ?>
            <ul class="right hide-on-med-and-down waves-effect">
                <li><a href="connexion.php">Connexion</a></li>
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