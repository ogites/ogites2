<!--
    Page avec la liste des connexions à la plateforme
-->
<?php  
    // Titre de la page
    $title = "Liste des connexions - Ô'GÎTES";
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(0);
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>JOURNAL DES CONNEXIONS</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

        <div class="container">
            <?php
                // Récupérer la liste des connexions
                $SQLParam = "SELECT * FROM connexion_log";
                $response = toFetch($SQLParam);
                $nb_connexion = toCount($SQLParam);

                if ($nb_connexion > 0)
                {
            ?>
            <br>
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-dark">
                        <th class="white" style="width: 5%;">#</th>
                        <th class="white">Utilisateurs</th>
                        <th class="white">Catégories</th>
                        <th class="white">Date Heure</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xc = 1;
                    while ($info_connexion = $response->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $xc ?></td>
                        <!-- Utilisateur -->
                        <?php
                        $id_users = $info_connexion["id_users"];
                        $info_users = requete("SELECT * FROM users WHERE id_users = $id_users");
                        ?>
                        <td><?php echo "@" . $info_users["pseudo"];  ?></td>
                        <!-- Catégorie  -->
                        <?php
                        $SQLParam2 = "SELECT libelle FROM categorie AS P1 "
                        . "LEFT JOIN users as P2 ON P1.id_categorie = P2.id_categorie "
                        . "WHERE P2.id_users = $id_users";
                        //echo $SQLParam2;
                        $categorie = requete($SQLParam2);
                        ?>
                        <td><?php echo $categorie["libelle"]  ?></td>
                        <!-- Date et heure -->
                        <?php
                        $date_heure = explode(" ", $info_connexion["date_connexion"]);
                        // Définition de la date de connexion
                        $date = datefr($date_heure[0]);
                        // Définition de l'heure de connexion
                        $heure = substr($date_heure[1], 0, -3);
                        ?>
                        <td><?php echo $date . " " . $heure  ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            else
            {
            ?>
            <h3 align="center">Aucune connexion.</h3>
            <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>