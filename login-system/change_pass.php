<?php 
    // Titre de la page
    $title = "Modifier mon mot de passe - Ô'GÎTES";
    require_once '../head.php';
    session_start();
    require_once 'config.php';
    header_page(0);

    //Changement de mot de passe
    if(isset($_POST['submit'])){
        $ancien_mdp = password_hash($_POST['ancien_mdp'], PASSWORD_DEFAULT);
        $new_mdp = password_hash($_POST['new_mdp'], PASSWORD_DEFAULT);
        $mdp_confirm = password_hash($_POST['mdp_confirm'], PASSWORD_DEFAULT);
        
        if((!empty($_POST['ancien_mdp'])) && (!empty($_POST['new_mdp'])) && (!empty($_POST['mdp_confirm']))){

            if($_POST['new_mdp'] != $_POST['ancien_mdp']){

                if($_POST['new_mdp'] == $_POST['mdp_confirm']) {
        
                    $bdd = bd_connect();
                    $req = $bdd->prepare("UPDATE users SET mdp = ? WHERE pseudo = ?");
                    $req->execute([
                        $new_mdp,
                        $_SESSION['pseudo']
                    ]);
                    $messageReussi = "Le mot de passe a bien été modifié !";
                        
        
                } else {
                    $erreurMessage = "Les mots de passes ne sont pas identiques !";
                }
        
            } else {
                $erreurMessage = "Le mot de passe doivent être différents...";
            }

        } else {
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
                        td a:hover{
                            text-decoration: none;
                            color: #1ABC9C;
                            font-weight: bold;
                        }
                        
                        th a {
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                        th a:hover{
                            display: block;
                            text-decoration: none;
                            color: black;
                        }
                    </style>
                    <thead>
                        <tr>
                            <th><h3><center><a href="param.php">Paramètre</a></center></h3></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td><a href="info.php">Mes informations personnelles</a></td>
                        </tr>
                        <tr>
                            <td><a href="change_pass.php">Changer de mot de passe</a></td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
           
            <div class="col-8">
                <form method="post">
                    <table class="table table-striped table-warning">
                        <thead>
                            <tr>
                                <th><h3><center>Modifier votre mot de passe</center></h3></th>
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
                    Entrez votre <strong>ancien</strong> mot de passe : <br>
                    <input type="password" name="ancien_mdp" class="form-control" >
                    <br><br>
                    Entrez un <strong>nouveau</strong> mot de passe : <br>
                    <input type="password" name="new_mdp" class="form-control">
                    <br><br>
                    Confirmer le mot de passe : <br>
                    <input type="password" name="mdp_confirm" class="form-control">
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
	// Ajout du footer
	require_once '../footer.php';
?>
