<!--
    Page permettant de gérer les utilisateurs
-->
<?php  
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
            $SQLParam = "SELECT * FROM users";
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            $nb_users = $Myresult->rowCount();

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
                    while ($info_users = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $info_users["id_users"] ?></td>
                        <td><?php echo $info_users["pseudo"] ?></td>
                        <td><?php echo $info_users["nom"] . " " . $info_users["prenom"]; ?></td>
                        <td><?php echo $info_users["email"] ?></td>
                        <td><?php echo $info_users["date_inscription"] ?></td>
                        <?php
                        if ($info_users["id_categorie"] == 1)
                        {
                        ?>
                        <td>Administrateur</td>
                        <?php
                        }
                        else
                        {
                        ?>
                        <td><a href="set_admin?id_users=<?php echo $info_users['id_users'] ?>" class="btn btn-danger">Définir comme admin</a></td>
                        <?php
                        }
                        ?>
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
            <h3 align="center">Aucun utilisateur dans la base de données.</h3>
            <?php
            }
            ?>
        </div>
    </div>
</main>