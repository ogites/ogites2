<!-- 
    Page de conversation
-->
<?php
    // Titre de la page
    $title = "Conversation - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
    // Initialisation de la session
    session_start();
    header_admin(1);
    // Définition des variables
    $expediteur = $_REQUEST["expediteur"];
    //echo $expediteur;
    $destinataire = $_REQUEST["destinataire"];
    //echo $destinataire;
?>
<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>CONVERSATION</strong></h1>
        <!-- Bouton Retour -->
        <a href="messagerie.php" class="btn btn-info btn-lg" style="float: right">
            <strong class="white">RETOUR</strong>
        </a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

        <div class="container">
            <?php
            // Récupérer tous les messages
            $SQLParam = "SELECT * FROM messages "
            . " WHERE (expediteur = $expediteur AND destinataire = $destinataire) OR (expediteur= $destinataire AND destinataire = $expediteur)";
            //echo $SQLParam; 
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            ?>
            <!-- Tableau des messages -->
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-primary">
                        <th class="white">Liste des messages</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($messages = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td>
                            <?php
                            //echo $messages["expediteur"];
                            if (($messages["expediteur"] == $expediteur) AND ($messages["destinataire"] == $destinataire))
                            {
                            ?>
                            <div style="float: left; width:100%">
                                <?php
                                $SQLParam2 = "SELECT * FROM users WHERE id_users = $expediteur";
                                $Myresult2 = $pdo->query($SQLParam2);
                                $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                                $info_expediteur = $Myresult2->fetch();
                                ?>
                                <h2><?php echo $info_expediteur["nom"] . " " . $info_expediteur["prenom"] ?></h2>
                                <h3><?php echo $messages["contenu"] ?></h3>
                                <p><?php echo $messages["date_heure"] ?></p>
                            </div>
                            <?php
                            }
                            else if (($messages["expediteur"] == $destinataire) AND ($messages["destinataire"] == $expediteur))
                            {
                            ?>
                            <div style="float: right" ; width:100%>
                                <?php
                                $SQLParam3 = "SELECT * FROM users WHERE id_users = $destinataire";
                                $Myresult3 = $pdo->query($SQLParam3);
                                $Myresult3->setFetchMode(PDO::FETCH_ASSOC);
                                $info_destinataire = $Myresult3->fetch();
                                ?>
                                <h2><?php echo $info_destinataire["nom"] . " " . $info_destinataire["prenom"]?></h2>
                                <h3><?php echo $messages["contenu"] ?></h3>
                                <p><?php echo $messages["date_heure"] ?></p>
                            </div>
                            <?php 
                            }
                            ?>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>