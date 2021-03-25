<?php  
    // Titre de la page
    $title = "Réserver un gîte - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Navbar de la page de résultat
    header_page(1);
    // Récupération de l'id du gîte voulu
    if(isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }
    // Récupération des informations du gîte
    $sql_gite = "SELECT * FROM gites"
    ." LEFT JOIN users ON users.id_users = gites.createur"
    ." WHERE id_gites = $id_gites";
    //echo $sql_gite;
    $Allgite = requete($sql_gite);
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <!-- Bouton retour -->
        <a href="view_gites.php?query=all" class="btn btn-info btn-lg" style="float: right;"><strong
                style="color:#fff">RETOUR</strong></a>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>
        <div class="container">
            <center>
                <!-- Libelle du gîte -->
                <h1><strong><?php echo $Allgite["libelle"]; ?></strong></h1>
            </center>
            <br>
            <div class="row">
                <div class="col-sm-7">
                    <?php
                        $sql_image_gite = "SELECT * FROM images_gites WHERE id_gites = $id_gites";
                        $image_gites = requete($sql_image_gite);
                        $image_link = $image_gites["link_url"];
                    ?>
                    <!-- Images du gîte -->
                    <div id="carouselImgGite" class="carousel slide" data-ride="carousel" data-interval="10000">
                        <?php
                        $nbImg = toCount("SELECT * FROM images_gites WHERE id_gites = $id_gites");
                        ?>
                        <ol class="carousel-indicators">
                            <li data-target="#carouselImgGite" data-slide-to="0" class="active"></li>
                            <?php
                            for ($i = 1 ; $i < $nbImg ; $i++)
                            {
                            ?>
                            <li data-target="#carouselImgGite" data-slide-to="<?php echo $i ?>"></li>
                            <?php
                            }
                            ?>
                        </ol>
                        <style>
                            .carousel-item img {
                                width: 800px;
                                height: 530px;
                                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                                border-radius: 3px;
                            }
                            /*.carousel-control.prev,
                            .carousel-control.next {
                                left: 0;
                                z-index: 1;
                            }*/
                        </style>
                        <div class="carousel-inner" style="height:530px;">
                            <?php
                            $response = toFetch("SELECT * FROM images_gites WHERE id_gites = $id_gites LIMIT $nbImg OFFSET 1");
                            $firstImage = requete("SELECT * FROM images_gites WHERE id_gites = $id_gites LIMIT 1");
                            ?>
                            <div class="carousel-item active">
                                <img src="<?php echo $firstImage["link_url"] ?>" alt="First slide">
                            </div>
                            <?php
                            while ($image = $response->fetch())
                            {
                            ?>
                            <div class="carousel-item">
                                <img src="<?php echo $image["link_url"] ?>" alt="">
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        if ($nbImg > 1) {
                        ?>
                        <a class="carousel-control-prev" href="#carouselImgGite"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselImgGite"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php } ?>
                    </div>
                   <!-- <img src="<?php echo $image_link; ?>" alt="image-gite"
                        style="height:450px; box-shadow: 1px 1px 12px #555;">-->
                    <br><br>
                    <!-- Localisation -->
                    <h3><strong>Localisation : </strong><?php echo $Allgite["localisation"]; ?></h3>
                    <br>
                    <!-- Prix -->
                    <h5><strong><em>Prix à titre indicatif : </em></strong><?php echo $Allgite["prix_nuit"]?> € / nuit
                    </h5>
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
                                    <i class="fa fa-info-circle" style="color:#fff;"></i> <span style="color:#fff;">Pour
                                        réserver, remplir les champs suivants : </span>
                                </center>
                            </th>
                        </tr>
                    </table>
                    <p style="color:#FF0000; text-align:center;">Veuillez remplir tous les champs</p>
                    <!-- Formulaire de réservation -->
                    <form action="reserv_gite.php?id_gites=<?php echo $id_gites; ?>" method="post">
                        <div class="form-group row">
                            <!-- Date de début -->
                            <label for="date_debut" class="col-sm-5 col-form-label" required>Date d'arrivée</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="date_debut"
                                    min="<?php echo date('Y-m-d'); ?>" id="date_debut">
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Date de fin -->
                            <label for="date_fin" class="col-sm-5 col-form-label" required>Date de départ</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="date_fin"
                                    min="<?php echo date('Y-m-d'); ?>" id="date_fin">
                            </div>
                        </div>
                        <script>
                            document.getElementById("date_debut").required = true;
                            document.getElementById("date_fin").required = true;
                        </script>

                        <?php
                        if (isset($_REQUEST["erreur"]))
                        {
                            echo "<center><strong style='color: #FF0000'>Ce gîte n'est pas disponible durant cette période</strong></center>";
                            echo "<br>";
                        }
                        ?>

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
                    </form>
                    <br>
                    <div class="col-sm-25">
                        <!-- Contacter le propriétaire -->
                        <table class="table">
                            <tr>
                                <th class="bg-secondary">
                                    <center>
                                        <i class="fa fa-info-circle" style="color:#fff;"></i> <span
                                            style="color:#fff;">Informations sur le propriétaire </span>
                                    </center>
                                </th>
                            </tr>
                            <!-- Afficher ces informations -->
                            <tr>
                                <td><i class="fa fa-address-book"></i> <strong>
                                        <?php echo ucfirst($Allgite["pseudo"]) ?> </strong><br>
                                    <i class="fa fa-at"></i> <?php echo $Allgite["email"] ?>
                                </td>
                            </tr>

                            <!-- Zone pour envoyer un message directement au propriétaire -->
                            <tr>
                                <td>
                                    <?php 
                                    if(isset($_REQUEST["action"]))
                                    {
                                    ?>
                                        <p>Saisissez le message a envoyer :</p>
                                        <?php
                                        // Définition de l'expéditeur et du destinataire
                                        $expediteur = $_SESSION["id_users"];
                                        $destinataire = $Allgite["createur"];
                                        ?>
                                        <form action="send_message.php?expediteur=<?php echo $expediteur  ?>&destinataire=<?php echo $destinataire ?>" method="POST">
                                            <textarea name="newMessage" cols="35" rows="3" class="form-control"></textarea>
                                            <br>
                                            <input type="submit" value="Envoyer" class="btn btn-outline-dark btn-sm btn-block">
                                        </form>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <style>
                                        a {
                                            color: #000;
                                        }

                                        a:hover {
                                            color: #000;
                                            font-weight: bold;
                                        }
                                        </style>
                                        <a href="info_gites2.php?id_gites=<?php echo $id_gites; ?>&action=sendMessage"
                                            style="text-decoration:none;">
                                            <i class="fa fa-commenting-o"></i>
                                            Cliquez-ici pour le contacter.
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
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