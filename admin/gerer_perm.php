<!--
    Page permettant de gérer les utilisateurs
-->
<?php  
    // Titre de la page
    $title = "Gérer les utilisateurs - Ô'GÎTES";
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
        <h1 style="float: left;"><strong>GÉRER LES UTILISATEURS</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

        <div class="container">
            <?php
            // Récupérer la liste des utilisateurs
            $SQLParam = "SELECT * FROM users ORDER BY date_inscription";
            $response = toFetch($SQLParam);
            $nb_users = toCount($SQLParam);

            if ($nb_users > 0)
            {
            ?>
            <br>
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th class="white">#</th>
                        <th class="white">Pseudo</th>
                        <th class="white">Nom Prénom</th>
                        <th class="white">Email</th>
                        <th class="white">Date Inscription</th>
                        <th class="white">Categorie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xc = 1;
                    while ($info_users = $response->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $xc; ?></td>
                        <td><?php echo $info_users["pseudo"] ?></td>
                        <td><?php echo $info_users["nom"] . " " . $info_users["prenom"]; ?></td>
                        <td><?php echo $info_users["email"] ?></td>
                        <td><?php echo datefr($info_users["date_inscription"]) ?></td>
                        <!-- Définir la catégorie de l'utilisateur -->
                        <td>
                            <style>
                                a {
                                    color: #fff;
                                }
                                a:hover {
                                    color: #fff;
                                }
                                .selected {
                                    font-weight: bold;
                                    text-decoration: underline;
                                }
                            </style>
                            <?php
                            $categorie = $info_users["id_categorie"];
                            $id_users = $info_users["id_users"];

                            // Switch sur la categorie de l'utilisateur afin d'afficher
                            // le bon bouton selectionné
                            switch ($categorie)
                            {
                                // Pour un admin
                                case 1:
                            ?>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off"> 
                                        <a href="set_client.php?id_users=<?php echo $id_users ?>">Client</a>
                                    </label>
                                    <label class="btn btn-primary" active>
                                        <input type="radio" name="options" id="option2" autocomplete="off" checked>
                                        <span class="selected white">Admin</span>
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option3" autocomplete="off">
                                        <a href="set_proprio.php?id_users=<?php echo $id_users ?>">Proprio</a>
                                    </label>
                                </div>
                            <?php
                                break;

                                // Pour un client
                                case 2:
                            ?>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-warning" active>
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> 
                                        <span class="selected white">Client</span>
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option2" autocomplete="off">
                                        <a href="set_admin.php?id_users=<?php echo $id_users ?>">Admin</a>
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option3" autocomplete="off">
                                        <a href="set_proprio.php?id_users=<?php echo $id_users ?>">Proprio</a>
                                    </label>
                                </div>
                            <?php
                                break;

                                // Pour un propriétaire
                                case 3:
                            ?>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off"> 
                                        <a href="set_client.php?id_users=<?php echo $id_users ?>">Client</a>
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option2" autocomplete="off">
                                        <a href="set_admin.php?id_users=<?php echo $id_users ?>">Admin</a>
                                    </label>
                                    <label class="btn btn-success" active>
                                        <input type="radio" name="options" id="option3" autocomplete="off" checked>
                                        <span class="selected white">Proprio</span>
                                    </label>
                                </div>
                            <?php
                                break;
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
            <h3 align="center">Aucun utilisateur dans la base de données.</h3>
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