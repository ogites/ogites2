<?php 
    // Titre de la page
    $title = "Modifier mon numero de portable - Ô'GÎTES";
    require_once '../head.php';
    session_start();
    require_once 'config.php';
    header_page(1);

    //Changement de mot de passe
    if(isset($_POST['submit'])){
        $ancien_tel = $_POST['ancien_tel'];
        $new_tel = $_POST['new_tel'];
        $tel_confirm = $_POST['tel_confirm'];
        // Si les champs ne sont pas vide
        if((!empty($_POST['ancien_tel'])) && (!empty($_POST['new_tel'])) && (!empty($_POST['tel_confirm']))){
            // Si l'ancien mot de passe est différent du nouveau
            if($_POST['new_tel'] != $_POST['ancien_tel']){
                // Si le nouveau mot de passe est pareil que la confirmation
                if($_POST['new_tel'] == $_POST['tel_confirm']) {
                    // Changement dans la base de données
                    $bdd = bd_connect();
                    $req = $bdd->prepare("UPDATE users SET tel = ? WHERE pseudo = ?");
                    $req->execute([
                        $new_tel,
                        $_SESSION['pseudo']
                    ]);
                    $messageReussi = "Votre numero a bien été modifié !";
                        
                        
                } else {
                    // Message d'erreur
                    $erreurMessage = "Il s'agit du même numéro de portable, réesayer";
                }
        
            } else {
                // Message d'erreur
                $erreurMessage = "";
            }

        } else {
            // Message d'erreur
            $erreurMessage = "Veuillez remplir tous les champs";
        }
    
    }
?>


<main role="main" class="flex-shrink-0">
    <div class="container-fluid" id="index">
        <div class="container">
            <div class="row">

                <div class="col-4">
                    <table class="table">
                        <style>
                        td a:focus,
                        td a {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }

                        td a:hover {
                            text-decoration: none;
                            color: #1ABC9C;
                            font-weight: bold;
                        }

                        th a {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }

                        th a:hover {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                        </style>
                        <thead>
                            <tr>
                                <th>
                                    <h3>
                                        <center><a href="param.php">Paramètres</a></center>
                                    </h3>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><a href="info.php">Mes informations personnelles</a></td>
                            </tr>
                            <tr>
                                <td><a href="change_pass.php">Changer de mot de passe</a></td>
                            </tr>
                            <tr>
                                <td><a href="change_tel.php">Changer de numéro de téléphone</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="col-8">
                    <form method="post">
                        <table class="table table-striped table-secondary">
                            <thead>
                                <tr>
                                    <th>
                                        <h3>
                                            <center>Modifier votre numéro de téléphone</center>
                                        </h3>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                        <center>
                            <?php
                            if(isset($erreurMessage)){
                                echo "<h6 style='color:red;'>".$erreurMessage."</h6>";
                            }
                        
                            if(isset($messageReussi)){
                                echo "<h6 style='color:green;'>".$messageReussi."</h6>";
                            }
                        ?>
                        </center>
                        Entrez votre <strong>ancien</strong> numéro : <br>
                        <input type="tel" name="ancien_tel" class="form-control" Pattern="^0[1-68]([-. ]?[0-9]{2}){4}$">
                        <br><br>
                        Entrez le <strong>nouveau</strong> numéro : <br>
                        <input type="tel" name="new_tel" class="form-control" Pattern="^0[1-68]([-. ]?[0-9]{2}){4}$">
                        <br><br>
                        Confirmation : <br>
                        <input type="tel" name="tel_confirm" class="form-control"
                            Pattern="^0[1-68]([-. ]?[0-9]{2}){4}$">
                        <br><br>
                        <center>
                            <input type="submit" name="submit" value="Valider" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
?>