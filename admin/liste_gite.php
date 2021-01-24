<!--
    Page d'accueil avec la liste des gîtes
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
        <h1><strong>LISTE DES GÎTES</strong></h1>
        <div class="container">
            <?php
            // Récupérer la liste des gîtes
            $SQLParam = "SELECT * FROM gites";
            $Myresult = $pdo->query($SQLParam);
            $Myresult->setFetchMode(PDO::FETCH_ASSOC);
            $nb_gites = $Myresult->rowCount();

            if ($nb_gites > 0)
            {
            ?>
            <br>
            <table class="table" style="width: 100%;">
                <thead>
                    <tr class="bg-success">
                        <th class="white" style="width: 5%;">#</th>
                        <th class="white">Libelle</th>
                        <th class="white">Description</th>
                        <th class="white">Localisation</th>
                        <th class="white">Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($info_gites = $Myresult->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo $info_gites["id_gites"]; ?></td>
                        <td><a href="<?php echo $info_gites["link_url"]; ?>" class="black"><?php echo $info_gites["libelle"]; ?></a></td>
                        <td><?php echo $info_gites["description"]; ?></td>
                        <td><?php echo $info_gites["localisation"]; ?></td>
                        <td><a href="gerer_gite.php?id_gites=<?php echo $info_gites['id_gites']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit white"></i><strong> <span class="white">Gérer</span></strong></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr style="text-align: center;">
                        <td colspan="5">
                            <a href="ajout_gite.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus white"></i> Ajouter</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            }
            else
            {
            ?>
            <h1>Aucun gîte dans la base de données.</h1>
            <br>
            <a href="ajout_gite.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus white"></i> Ajouter</a>
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