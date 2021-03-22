<!--
    Espace messagerie entre un admin et les autres utilisateurs
-->
<?php
    // Titre de la page
    $title = "Messagerie Admin - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
    // Initialisation de la session
    session_start();
    header_admin(1);
    // Définition des variables
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $id_users = $_SESSION["id_users"];
?>
<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>MESSAGERIE ADMINISTRATEUR</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div> 

        <div class="container">
            <?php
                // Récupérer la liste expediteur
                $SQLParam = "SELECT DISTINCT expediteur FROM messages "
                . "WHERE expediteur != $id_users AND destinataire = $id_users AND type_message = 2";
                $response = toFetch($SQLParam);
                $nb_messages = toCount($SQLParam);

                if ($nb_messages > 0) {
            ?>
            <br>
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-primary">
                        <th class="white" style="width: 5%;">#</th>
                        <th class="white" style="width: 30%;">Conversations</th>
                        <th class="white">Dernier message</th>
                        <th class="white" style="width: 15%; text-align: center">Vu</th>
                    </tr>
                </thead>
                <style>
                    a {
                        color: #000;
                    }

                    a:hover {
                        color: #000;
                        font-weight: bold;
                        text-decoration: none;
                    }
                </style>
                <tbody>
                    <?php
                        $xc = 1;
                        while ($info_messages = $response->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $xc ?></td>
                        <?php
                        // Définition du nom et prénom du client
                        $id_client = $info_messages["expediteur"];
                        $SQLParam2 = "SELECT nom, prenom FROM users WHERE id_users = $id_client";
                        $info_client = requete($SQLParam2);
                        $nom_prenom = $info_client["nom"] . " " . $info_client["prenom"];
                        ?>
                        <td><a href="convers.php?expediteur=<?php echo $id_client ?>&destinataire=<?php echo $id_users ?>""><?php echo $nom_prenom; ?></a></td>
                        <?php
                        // Récupération du dernier message
                        $SQLParam3 = "SELECT contenu, id_message, etat_message FROM messages " 
                        . "WHERE (expediteur = $id_client AND destinataire = $id_users) OR (expediteur = $id_users AND destinataire = $id_client) "
                        . "ORDER BY id_message DESC LIMIT 1";
                        $dernier_message = requete($SQLParam3);
                        ?>
                        <td><?php echo reduceText($dernier_message["contenu"], 60);?></td>
                        <td style="text-align: center">
                            <button class="btn btn-light" disabled="true">
                                <strong>
                                    <?php
                                    // Si le message a été vu
                                    if ($dernier_message["etat_message"] == 1)
                                    {
                                    ?>
                                        <i class="fa fa-check" style="color: #31B2E9"></i>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <i class="fa fa-check" style="color: #A1A3A5"></i>
                                    <?php
                                    }
                                    ?>
                                </strong>
                            </button>
                        </td>
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
                <h3 align="center">Aucune conversation</h3>
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