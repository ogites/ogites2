<?php   
/*
    Script de connexion au site
*/
//  Connexion à la base de données
    require_once 'config.php';
    
    if(isset($_POST['submit'])){

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        if((!empty($pseudo)) && (!empty($mdp))) 
        {
            $database = bd_connect();
            // Récupération de l'utilisateur et de son pass hashé
            $req = $database->prepare("SELECT * FROM users WHERE pseudo = ?");
            $req->execute(array(
                $pseudo
            ));
            $resultat = $req->fetch();

            // Comparaison du pass envoyé via le formulaire avec la base
            $correct_mdp = password_verify($_POST['mdp'], $resultat['mdp']);

            if (!$resultat)
            {
                $erreurMessage = 'Mauvais identifiant ou mot de passe !';
            }
            else
            {
                if ($correct_mdp) 
                {
                    session_start();
                    $_SESSION['id_users'] = $resultat['id_users'];
                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['nom'] = $resultat['nom'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    $_SESSION['email'] = $resultat['email'];
                    $_SESSION['motDePasse'] = $resultat['mdp'];
                    $_SESSION['date'] = $resultat['date_inscription'];
                    $_SESSION['id_categorie'] = $resultat['id_categorie'];

                    $messageReussi = 'Vous êtes connecté !';

                    if(isset($_SESSION['pseudo']))
                    {
                        header('refresh:2; url=../index.php');
                    } 
                    
                }
                else 
                {
                    $erreurMessage = 'Mauvais identifiant ou mot de passe !';
                }
            }
        } 
        else 
        {
            $erreurMessage = 'Veuillez remplir tous les champs';
        }

    }
?>
<title>Se connecter - Ô'GÎTES</title>
<link rel="icon" href="/ogites2/images/new-logo.png">
<link rel="stylesheet" type="text/css" href="../style.css"/>
<link rel="stylesheet" type="text/css" href="../scss/connect.scss"/>
<link rel="stylesheet" type="text/css" href="../scss/profil.scss"/>
<script src="https://kit.fontawesome.com/a076d05399.js"> </script>

<body>
    <div class="container">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>
        <div class="tab-body" id="titre">
            <h2>DÉJÀ INSCRIT ?</h2>
            <h3>Identifiez-vous ci-dessous !</h3>
        </div>
        <div class="tab-body-message1" id="message">
            <h4>
                <?php 
                    if(isset($erreurMessage)) 
                    { 
                        echo '<p style="
                        margin-bottom: 0px;
                        margin-right: 10px;
                        margin-left: 10px;
                        margin-top: 10px;"
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
                        margin-left: 10px;
                        margin-top: 10px;"
                        > ' . $messageReussi . ' </p>';
                    } 
                ?>
            </h4>
        </div>
        <div class="tab-other-body" id="connexion">
            <form method="post">
                <div class="ligne">
                    <i class="fas fa-user"></i>
                    <input type="text" class="input" name="pseudo" placeholder="Pseudo" />       
                </div>

                <div class="ligne">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" name="mdp" placeholder="Mot de passe" />
                </div>
                <input type="submit" name="submit" value="Se connecter" />
            </form>
        </div>
        <div class="tab-footer">
            <h5>Vous n'avez pas de compte ? </h5> <i class="fas fa-chevron-circle-right"></i> 
        </div>
        <div class="tab-footer1">
            <a class="tab-link" href="inscription.php">Cliquez ici</a>
        </div>
    </div>
</body>
