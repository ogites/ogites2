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
            <!-- Style du tableau -->
            <style>
                table {
                    width: 100%;
                }

                thead, tbody, tr, td, th { display: block; }

                tr:after {
                    content: ' ';
                    display: block;
                    visibility: hidden;
                    clear: both;
                }

                thead th {
                    height: auto;

                    /*text-align: left;*/
                }

                tbody {
                    height: 600px;
                    overflow-y: auto;
                }

                thead {
                    /* fallback */
                }

                #newMessage {
                    width: 87%;
                }

                .left {
                    float: left;
                }

                .right {
                    float: right;
                }

                .white {
                    color: #fff;
                }
            </style>
            <br>
            <?php
            // Récupérer tous les messages
            $SQLParam = "SELECT * FROM messages WHERE (expediteur = $expediteur AND destinataire = $destinataire)"
            . " OR (expediteur= $destinataire AND destinataire = $expediteur) ORDER BY id_message DESC";
            //echo $SQLParam; 
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            ?>
            <!-- Tableau des messages -->
            <table class="table table-hover">
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
                                // Définition du nom de l'expéditeur
                                $SQLParam2 = "SELECT * FROM users WHERE id_users = $expediteur";
                                $info_expediteur = requete($SQLParam2);
                                ?>
                                <h5><strong><?php echo $info_expediteur["nom"] . " " . $info_expediteur["prenom"] ?></strong></h5>
                                <p><?php echo $messages["contenu"] ?></p>
                                <?php 
                                // Définition de la date d'envoi
                                $date_heure = explode(" ", $messages["date_heure"]);
                                $date_envoi = datefr($date_heure[0]);  
                                // Définition de l'heure d'envoi
                                $heure_envoi = substr($date_heure[1], 0, -3);
                                ?>
                                <p><small><?php echo $date_envoi . " " . $heure_envoi ?></small></p>
                            </div>
                            <?php
                            }
                            else if (($messages["expediteur"] == $destinataire) AND ($messages["destinataire"] == $expediteur))
                            {
                            ?>
                            <div style="float: right" ; width:100%>
                                <h5 style="text-align: right;"><strong>Vous</strong></h5>
                                <p><?php echo $messages["contenu"] ?></p>
                                <?php 
                                // Définition de la date et de l'heure d'envoi du message
                                $date_heure = explode(" ", $messages["date_heure"]);
                                $date_envoi = datefr($date_heure[0]); 
                                // Définition de l'heure d'envoi
                                $heure_envoi = substr($date_heure[1], 0, -3); 
                                // Marquer le message comme lu
                                $id_message = $messages["id_message"];
                                //echo $id_message;
                                valideMessage($id_message);
                                ?>
                                <p style="text-align: right;"><small><?php echo $date_envoi . " " . $heure_envoi ?></small></p>
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
            <!-- Envoie d'un nouveau message -->
            <div style="margin: 30px">
                <form action="send_message.php?expediteur=<?php echo $destinataire ?>&destinataire=<?php echo $expediteur ?>" method="POST">
                    <button type="submit" class="btn btn-success right" style="width: auto;">
                        <strong class="white">Envoyer</strong> <i class="fa fa-paper-plane white"></i>
                    </button>
                    <input type="text" name="newMessage" id="newMessage" class="form-control" placeholder="Entrez votre message.">
                </form>
            </div>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>