<?php 
    require_once 'header-profil.php'
?>

<?php
    session_start();
    require_once 'config.php';

?>

<link rel="stylesheet" type="text/css" href="../scss/compte.scss"/>
<body>

    <div class="container">
        <h1>INFORMATIONS</h1>

        <!- Vérification de l'utilisateur connecté ->
        <div class="tab-body">
            <?php 
                if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
                {
                    echo '<em>Ce que nous savons de vous : </em><strong>' . $_SESSION['pseudo'] . '</strong>';
                }
            ?>
        </div>

        <!- Informations de l'utilisateur connecté ->
        <div class="tab-other-body">
            <p><strong>Nom de famille :</strong></p>
            <?php
                echo $_SESSION['nom'];
            ?>
            <p><strong>Prénom :</strong></p>
            <?php
                echo $_SESSION['prenom'];
            ?>
            <p><strong>Adresse mail :</strong></p>
            <?php
                echo $_SESSION['email'];
            ?>
            <p><strong>Inscrit le :</strong></p>
            <?php
                echo $_SESSION['date'];
            ?>
        </div>
    </div>

</body>