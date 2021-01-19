<?php 
    require_once 'header-profil.php'
?>

<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['submit'])){
        $ancien_mdp = password_hash($_POST['ancien_mdp'], PASSWORD_DEFAULT);
        $new_mdp = password_hash($_POST['new_mdp'], PASSWORD_DEFAULT);
        $mdp_confirm = password_hash($_POST['mdp_confirm'], PASSWORD_DEFAULT);
        
        if((!empty($_POST['ancien_mdp'])) && (!empty($_POST['new_mdp'])) && (!empty($_POST['mdp_confirm']))){

            if($_POST['new_mdp'] != $_POST['ancien_mdp']){

                if($_POST['new_mdp'] == $_POST['mdp_confirm']) {
        
                    $bdd = bd_connect();
                    $req = $bdd->prepare("UPDATE client SET mdp = ? WHERE pseudo = ?");
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

<link rel="stylesheet" type="text/css" href="../scss/param.scss"/>

<body>

    <div class="container">
        <div class="logo">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="tab-body">
            <h1 style="margin-top: 80px;">Voulez-vous changé de mot de passe ? </br><i class="fas fa-angle-double-down" style="margin-top: 10px;"></i></h1>

            <div class="tab-body-message1" id="message">
            <h4>
                <?php 
                    if(isset($erreurMessage)) 
                    { 
                        echo '<p style="
                        margin-bottom: 0px;
                        margin-right: 10px;
                        margin-left: 10px;"
                        > ' . $erreurMessage . ' </p>';
                    } 
                ?>
            </h4>
            </div>

            <div class="tab-body-message2" id="message">
            <h4>
                <?php 
                    if(isset($messageReussi)) 
                    { 
                        echo '<p style="
                        margin-bottom: 0px;
                        margin-right: 10px;
                        margin-left: 10px;"
                        >' . $messageReussi . ' </p>';
                    } 
                ?>
            </h4>
            </div>
        </div>
        <div class="tab-other-body">
            <form method="post">
                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="ancien_mdp" placeholder="Ancien mot de passe" />
                </div>

                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="new_mdp" placeholder="Nouveau mot de passe" />
                </div>

                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="mdp_confirm" placeholder="Confirmation de mot de passe" />
                </div>

                <input type="submit" name="submit" value="Valider" />
            </form>
        </div>
    
    </div>


</body>
