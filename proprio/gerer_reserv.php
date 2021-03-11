<!--
    Page permettant de gérer les réservations
-->
<?php  
    // Titre de la page
    $title = "Gérer les réservations - Ô'GÎTES";
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(0);
    // Définition des variables
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $id_users = $_SESSION["id_users"];
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>GÉRER LES RÉSERVATIONS</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

        <div class="container">
            <?php
            // Récupérer la liste des réservations
            $SQLParam = "SELECT * FROM reservation as P1 "
            . "LEFT JOIN gites as P2 ON P1.id_gites = P2.id_gites "
            . "WHERE P2.createur = $id_users";
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            $nb_reserv = $Myresult->rowCount();

            if ($nb_reserv > 0)
            {
            ?>
            <br>
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-warning">
                        <th class="white">#</th>
                        <th class="white">Libelle</th>
                        <th class="white">Date de début</th>
                        <th class="white">Date de fin</th>
                        <th class="white">Client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xc = 1;
                    while ($info_reserv = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $xc; ?></td>
                        <?php
                        // Récupération du libelle du gîte réservé
                        $id_gites = $info_reserv["id_gites"];
                        $SQLParam2 = "SELECT * FROM gites WHERE id_gites = $id_gites";
                        $Myresult2 = $pdo->query($SQLParam2);
                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                        $info_gites = $Myresult2->fetch();
                        $libelle_gite = $info_gites["libelle"];
                        ?>
                        <td><?php echo $libelle_gite ?></td>
                        <td><?php echo datefr($info_reserv["date_debut"]) ?></td>
                        <td><?php echo datefr($info_reserv["date_fin"]) ?></td>
                        <?php
                        // Récupération du nom et prénom du client qui a réservé
                        $id_users = $info_reserv["id_users"];
                        $SQLParam3 = "SELECT * FROM users WHERE id_users = $id_users";
                        $Myresult3 = $pdo->query($SQLParam3);
                        $Myresult3->setFetchMode(PDO::FETCH_ASSOC);
                        $info_users = $Myresult3->fetch();
                        $nom_prenom_user = $info_users["nom"] . " " . $info_users["prenom"];
                        ?>
                        <td><?php echo $nom_prenom_user ?></td>
                    </tr>
                    <?php
                        $xc++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            else
            {
            ?>
            <h3 align="center">Aucune réservation dans la base de données.</h3>
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