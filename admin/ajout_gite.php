<!--
    Page permettant d'ajouter des gîtes
-->
<?php  
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(0);

    if (isset($_REQUEST["origin"]))
    {
        $origin = $_REQUEST["origin"];
    }
    else
    {
        $origin = "index";
    }
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>AJOUTER UN GÎTE</strong></h1>
        <!-- Bouton RETOUR en fonction de la page précédent -->
        <?php
        if ($origin == "list") // Si on vient de la liste des gîtes : Retour vers liste_gite.php
        {
        ?>
        <a href="liste_gite.php" class="btn btn-info btn-lg"  style="float: right;"><strong class="white">RETOUR</strong></a>
        <?php
        }
        else // Si on vient d'autres part : Retour vers index.php
        {
        ?>
        <a href="index.php" class="btn btn-info btn-lg"  style="float: right;"><strong class="white">RETOUR</strong></a>
        <?php
        }
        ?>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>
        <br>

        <div class="container">
            <h5><i class="fa fa-info"></i> Veuillez inscrire les informations du gîte à ajouter au système.</h5>
            <br>
            <form action="insert_gite.php?origin=<?php echo $origin ?>" method="POST" class="border-top">
                <?php
                if (isset($_REQUEST["error"]))
                {
                ?>
                <button class="btn btn-danger btn-block">Ce gîte existe déjà.</button>
                <?php
                }
                ?>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" name="libelle" placeholder="Libelle du gîte" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="libelle">Nb. personnes Max</label>
                        <input type="number" class="form-control" name="nb_personnes_max" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="libelle">Localisation</label>
                        <input type="text" class="form-control" name="localisation" placeholder="Localisation du gîte" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="6" type="text" class="form-control" name="description" placeholder="Description du gîte" required></textarea>
                </div>
                <div class="form-group">
                    <label for="link_url">Lien du gîte</label>
                    <input type="text" class="form-control" name="link_url" placeholder="Lien du gîte" required>
                </div>
                <div class="form-group">
                    <label for="link_image">Lien d'une image du gîte</label>
                    <input type="text" class="form-control" name="link_image" placeholder="Lien d'une image du gîte" required>
                </div>
                <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus-square white"></i> Ajouter</button>
            </form>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>