<!--
    Page avec la liste des gîtes
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
        <h1 style="float: left;"><strong>LISTE DES GÎTES</strong></h1>
        <!-- Bouton Retour -->
        <a href="index.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

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
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr class="bg-success">
                        <th class="white" style="width: 5%;">#</th>
                        <th class="white" style="width: 20%;">Libelle</th>
                        <th class="white">Description</th>
                        <th class="white" style="width: 15%;">Localisation</th>
                        <th class="white" style="width: 10%;">Gestion</th>
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
            <a href="ajout_gite.php?origin=list" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus white"></i> Ajouter</a>
            
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>