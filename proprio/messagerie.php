<!-- 
    Espace messagerie entre le propriétaire et les clients
-->
<?php
    // Titre de la page
    $title = "Messagerie - Ô'GÎTES";
    //Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
    // Initialisation de la session
    session_start();
    header_admin(1);
    // Définition des variables
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $id_users = $_SESSION["id_users"];
    //echo $id_users;
?>
<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>MESSAGERIE</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>   

        <div class="container">
            <?php
            // Récupérer la liste des messages
            $SQLParam = "SELECT DISTINCT expediteur FROM messages";
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            $nb_messages = $Myresult->rowCount();

            if ($nb_messages > 0)
            {
            ?>
            <br>
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-primary">
                        <th class="white" style="width: 5%;">#</th>
                        <th class="white" style="width: 30%;">Expéditeur</th>
                        <th class="white">Dernier message</th>
                        <th class="white" style="width: 15%; text-align: center">Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xc = 1;
                    while ($info_messages = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $xc ?></td>
                        <?php
                        // Définition du nom et prénom du client
                        $id_client = $info_messages["expediteur"];
                        $SQLParam2 = "SELECT nom, prenom FROM users WHERE id_users = $id_client";
                        $Myresult2 = $pdo->query($SQLParam2);
                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                        $info_client = $Myresult2->fetch();
                        $nom_prenom = $info_client["nom"] . " " . $info_client["prenom"];
                        ?>
                        <td><?php echo $nom_prenom; ?></td>
                        <?php
                        // Récupération du dernier message
                        $SQLParam3 = "SELECT contenu, id_message FROM messages " 
                        . "ORDER BY id_message DESC LIMIT 1";
                        $Myresult3 = $pdo->query($SQLParam3);
                        $Myresult3->setFetchMode(PDO::FETCH_ASSOC);
                        $dernier_message = $Myresult3->fetch();
                        ?>
                        <td><?php echo reduceText($dernier_message["contenu"], 60);?></td>
                        <td><a href="convers.php?expediteur=<?php echo $id_client ?>&destinataire=<?php echo $id_users ?>" class="btn btn-warning"> <strong><i class="fa fa-comment white"></i> <span class="white">Voir tout</span></strong></td>
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
            <h3 align="center">Aucun gîte dans la base de données.</h3>
            <br>
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