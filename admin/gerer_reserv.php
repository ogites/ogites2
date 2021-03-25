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
            $SQLParam = "SELECT * FROM reservation ORDER BY date_debut DESC";
            $Myresult = toFetch($SQLParam);
            $nb_reserv = toCount($SQLParam);
            //echo $nb_reserv;

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
                        <th class="white">État</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xc = 1;
                    while ($info_reserv = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td>
                            <?php
                                $datejour = date("Y-m-d");
                                if ($info_reserv["date_reserv"] == $datejour)
                                {
                                    echo "<button class='btn btn-danger btn-sm'>"
                                    . "<strong class='white'>New</strong>"
                                    . "</button>";
                                }
                                else 
                                {
                                    echo $xc; 
                                }
                            ?>
                        </td>
                        <?php
                        // Récupération du libelle du gîte réservé
                        $id_gites = $info_reserv["id_gites"];
                        $SQLParam2 = "SELECT * FROM gites WHERE id_gites = $id_gites";
                        $info_gites = requete($SQLParam2);
                        $libelle_gite = $info_gites["libelle"];
                        ?>
                        <!-- Libelle du gîte -->
                        <td><?php echo $libelle_gite ?></td>
                        <!-- Date de début de la réservation -->
                        <td><?php echo datefr($info_reserv["date_debut"]) ?></td>
                        <!-- Date de fin de la réservation -->
                        <td><?php echo datefr($info_reserv["date_fin"]) ?></td>
                        <?php
                        // Récupération du nom et prénom du client qui a réservé
                        $id_users = $info_reserv["id_users"];
                        //echo $id_users;
                        $SQLParam3 = "SELECT * FROM users WHERE id_users = $id_users";
                        //echo $SQLParam3;
                        $info_users = requete($SQLParam3);
                        $nom_prenom_user = $info_users["nom"] . " " . $info_users["prenom"];
                        ?>
                        <!-- Nom du client ayant réservé -->
                        <td><?php echo $nom_prenom_user ?></td>
                        <!-- État de la réservation (Effectué ou non) -->
                        <td>
                            <?php
                            $etat_reservation = $info_reserv["etat_reservation"];
                            //echo $etat_reservation;
                            // Si la réservation a été validée
                            if ($etat_reservation == 1)
                            {
                            ?>
                            <button class="btn btn-success"><i class="fa fa-check white"></i></button>
                            <?php
                            }
                            // Si la réservation est en cours
                            else
                            {
                            ?>
                            <button class="btn btn-danger"><i class="fa fa-clock-o white"></i></button>
                            <?php
                            }
                            ?>
                        </td>
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