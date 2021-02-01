<?php  
    // Titre de la page
    $title = "Réserver un gîte - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Navbar de la page de résultat
    header_page(0);
    // Récupération de l'id du gîte voulu
    if(isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }
    // Récupération des informations du gîte
    $sql_gite = "select * from gites where id_gites = $id_gites";
    $Myresult = $pdo->query($sql_gite);
    $Myresult->setFetchMode(PDO::FETCH_ASSOC);
    $Allgite = $Myresult->fetch();
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
        <!-- Bouton retour -->
        <a href="view_gites.php?query=all" class="btn btn-info btn-lg" style="float: right;"><strong style="color:#fff">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>
        <div class="container">
        <center>
            <!-- Libelle du gîte -->
            <h1><strong><?php echo $Allgite["libelle"]; ?></strong></h1>
        </center>
        <br><br>
            <div class="row">
                <div class="col-sm-7">
                    <?php
                        $sql_image_gite = "select * from images_gites where id_gites = $id_gites";
                        $Myresult2 = $pdo->query($sql_image_gite);
                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                        $image_gites = $Myresult2->fetch();
                        $image_link = $image_gites["link_url"];
                    ?>
                    <!-- Image du gîte -->
                    <img src="<?php echo $image_link; ?>" alt="image-gite" style="height:450px; box-shadow: 1px 1px 12px #555;">
                    <br><br>
                    <!-- Localisation -->
                    <h3><strong>Localisation : </strong><?php echo $Allgite["localisation"]; ?></h3>
                    <br>
                    <!-- Description -->
                    <h3><strong>Description : </strong></h3>
                    <h5><?php echo $Allgite["description"]; ?></h5>
                </div>
                <div class="col-sm-4" style="margin-left: 50px;">
                    <!-- Directives -->
                    <table class="table">
                        <tr>
                            <th class="bg-success">
                                <center>
                                    <i class="fa fa-info-circle" style="color:#fff;"></i> <span style="color:#fff;">Pour réserver, remplir les champs suivants : </span>
                                </center>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <!-- Formulaire de réservation -->
                    <form action="reserv_gite.php?id_gites=<?php echo $id_gites; ?>" method="post">
                        <div class="form-group row">
                            <!-- Date de début -->
                            <label for="date_debut" class="col-sm-5 col-form-label">Date d'arrivée</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="date_debut" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <!-- Date de fin -->
                            <label for="date_fin" class="col-sm-5 col-form-label">Date de départ</label>
                            <div class="col-sm-7">      
                                <input type="date" class="form-control" name="date_fin" >
                            </div>
                        </div>
                        <br>
                        <!-- Nombre de personnes -->
                        <?php 
                        $nb_personne_max = $Allgite["nb_personnes_max"];
                        ?>
                        <i class="fa fa-users"></i> Choisir le nombre de personnes :
                        <select name="selectPersonne" class="form-control" id="select">
                            <?php 
                            for($i = 1; $i <= $nb_personne_max; $i++)
                            {
                                if($i == 1)
                                {
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> personne</option>
                                <?php    
                                }
                                else
                                {
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> personnes</option>
                            <?php 
                                }
                            } 
                            ?>
                        </select>
                        <br>
                        <!-- Validation -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Réserver</button>
                        <a href="" class="btn btn-warning btn-lg btn-block" style="color:#fff">Voir plus</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>