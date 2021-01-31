<!--
    Page permettant de gérer un gîte
-->
<?php  
    // Titre de la page
    $title = "Gérer un gîte - Ô'GÎTES";
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(0);

    // Récupération de l'id du gîte
    if (isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }
    // Récupération de l'action a affectué
    if (isset($_REQUEST["action"]))
    {
        $action = $_REQUEST["action"];
    }

    // Récupération des informations du gîte
    $SQLParam = "SELECT * FROM gites WHERE id_gites = $id_gites";
    $Myresult = $pdo->query($SQLParam);
    $Myresult->setFetchMode(PDO::FETCH_ASSOC);
    $info_gite = $Myresult->fetch();
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Titre de la page -->
        <h1 style="float: left;"><strong>GÉRER UN GÎTE</strong></h1>
        <!-- Bouton Retour -->
        <a href="liste_gite.php" class="btn btn-info btn-lg" style="float: right;"><strong class="white">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>

        <div class="container">
        <!-- TODO Supprimer un gîte et ses informations -->
            <div class="border-bottom">
                <?php
                // Si on clique sur le bouton modifier
                if ((isset($_REQUEST["action"])) && ($action == "modif"))
                {
                ?>
                <!-- Formulaire de modification du libelle -->
                <form action="modif_gite.php?id_gites=<?php echo $id_gites ?>" method="POST">
                <center>
                    <div class="form-group col-md-7">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" name="libelle" value="<?php echo $info_gite["libelle"] ?>">
                    </div>
                </center>
                <?php
                }
                else
                {
                ?>
                <!-- Libelle du gîte -->
                <h2 class="center"> Gîte :&nbsp; <strong><a target="_blank" href="<?php echo $info_gite["link_url"] ?>"><?php echo $info_gite["libelle"] ?></a></strong></h2>
                <?php
                }
                ?>
                <br>
                <!-- Cartes d'action -->
                <div class="card-deck center">
                    <!-- Modifier les informations -->
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-body white">
                            <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>&action=modif" class="stretched-link">
                                <h5 class="card-title white"><i class="fa fa-edit white"></i> Modifier</h5>
                            </a>
                            <p class="card-text white">Modifier les informations.</p>
                        </div>
                    </div>
                    <!-- Ajouter une image au gîte -->
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body white">
                            <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>&action=add" class="stretched-link">
                                <h5 class="card-title white"><i class="fa fa-plus white"></i> Ajouter</h5>
                            </a>
                            <p class="card-text white">Ajouter une image au gîte.</p>
                        </div>
                    </div>
                    <!-- Voir les images du gîte -->
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-body white">
                            <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>&action=view" class="stretched-link"><h5 class="card-title white"><i class="fa fa-eye white"></i> Voir</h5></a>
                            <p class="card-text white">Voir les images du gîte.</p>
                        </div>
                    </div>
                </div>
                
                <br>

                <center>
                    <h5><a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>&action=supp" class="btn btn-light"><strong style="color:#DC3545">Supprimer le gîte</strong></a></h5>
                    <?php 
                    if ((isset($_REQUEST["action"])) && ($action == "supp")) 
                    {
                    ?>
                    <h5>Vous êtes sur le point de supprimer ce gîte.</h5>
                    <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>" class="btn btn-secondary">Annuler</a>
                    <a href="supp_gite.php?id_gites=<?php echo $id_gites ?>" class="btn btn-danger">Supprimer</a>
                    
                    <?php
                    }
                    ?>
                </center>

                <br>

                <?php
                // Si on clique sur le bouton ajouter
                if ((isset($_REQUEST["action"])) && ($action == "add"))
                {
                ?>
                <!-- Formulaire d'ajout d'une image au gîte -->
                <form action="add_image_gite.php?id_gites=<?php echo $id_gites ?>" method="POST">
                    <div class="form-group col-md-12">
                        <label for="link_image">Ajouter une image</label>
                        <input type="text" name="link_image" class="form-control" required>
                        <br>
                        <center>
                            <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>" class="btn btn-secondary btn-lg">Annuler</a>
                            <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
                        </center>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
            
            <div class="border-bottom">
                <br>
                <?php
                // Si on clique sur le bouton voir
                if ((isset($_REQUEST["action"])) && ($action == "view"))
                {
                ?>
                    <h3><strong>LISTE DES IMAGES :</strong></h3>
                    <br>
                    <div class="card-columns">
                    <?php
                    // Liste des images du gîte
                    $SQLParam2 = "SELECT * FROM images_gites WHERE id_gites = $id_gites";
                    $Myresult2 = $pdo->query($SQLParam2);
                    $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                    //echo $SQLParam2;
                    while ($images_gite = $Myresult2->fetch())
                    {
                    ?>
                        <!-- Affichage des images -->
                        <div class="card">
                            <img class="card-img" src="<?php echo $images_gite["link_url"] ?>" alt="Card image">
                        </div>
                    
                    <?php
                    }
                    ?>
                    </div>
                    <br>
                    <!-- Retour vers la page normal -->
                    <center>
                        <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>" class="btn btn-secondary btn-lg">Annuler</a>
                    </center>
                <?php
                }
                // Si on clique sur le bouton modifier
                else if ((isset($_REQUEST["action"])) && ($action == "modif"))
                {

                ?>
                <!-- Formulaire de modification -->
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="localisation">Localisation</label>
                        <input type="text" class="form-control" name="localisation" value="<?php echo $info_gite["localisation"] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nb_personnes_max">Nb. personnes Max</label>
                        <input type="number" class="form-control" name="nb_personne_max" value="<?php echo $info_gite["localisation"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Description</label>
                    <textarea rows="5" class="form-control" name="description"><?php echo $info_gite["description"] ?></textarea>
                </div>
                <center>
                    <a href="gerer_gite.php?id_gites=<?php echo $id_gites ?>" class="btn btn-secondary btn-lg">Annuler</a>
                    <button type="submit" class="btn btn-primary btn-lg">Modifier</button>
                </center>
                </form>
                <?php
                }
                else
                { // Sinon on affiche les informations du gîte
                ?>      
                <!-- Localisation du gîte -->
                <h3 style="float: left;">Localisation :&nbsp; <strong><?php echo $info_gite["localisation"] ?></strong></h3>
                <!-- Nb. personnes Max du gîte -->
                <h3 style="float: right;">Nb. personnes Max :&nbsp; <strong><?php echo $info_gite["nb_personnes_max"] ?></strong></h3>
                <!-- Nettoyage du flottement -->
                <div style="clear: both;"></div>
                <!-- Description du gîte -->
                <br>
                <h3>Description :&nbsp; <strong><?php echo $info_gite["description"] ?></strong></h3>
                <?php
                }
                ?>
                <br>
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