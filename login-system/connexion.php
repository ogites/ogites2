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
                    $_SESSION['port'] = $resultat['tel'];
                    $_SESSION['motDePasse'] = $resultat['mdp'];
                    $_SESSION['date'] = $resultat['date_inscription'];
                    $_SESSION['id_categorie'] = $resultat['id_categorie'];

                    $messageReussi = 'Vous êtes connecté, patientez un instant...';

                    // Ajout dans le journal de réduction
                    addLogConnection($_SESSION["id_users"]);

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
<link rel="stylesheet" type="text/css" href="../style.css" />
<link rel="stylesheet" type="text/css" href="../scss/connect.scss" />
<script src="https://kit.fontawesome.com/a076d05399.js"> </script>

<body>

    <div style="position: relative;
        width: 450px;
        background-color: #eaebec;
        padding: 15px 25px;
        border-radius: 10px;"
    >

        <h2 style="text-align:center;">
            DÉJÀ INSCRIT ?
        </h2>
        <h3 style="text-align:center; margin-bottom: 20px;"> Identifiez-vous ci-dessous !</h3>
        <!-- Affichage des erreurs et messages durant la saisie dans le formulaire -->
        <div>
            <h6 style="text-align:center;">
                <?php 
                if(isset($erreurMessage)) 
                { 
                    echo '<p style="color:#FF0000;"> ' . $erreurMessage . ' </p>';
                } 
                ?>
            </h6>
        </div>
        <div>
            <h6 style="text-align:center;">
                <?php 
                if(isset($messageReussi))
                {
                    echo '<p style="color:#28B463;">'. $messageReussi .'</p>';
                }
                ?>
            </h6>
        </div>

        <!-- Formulaire -->
        <div style="position: relative;
            width: 400px;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0px 5px 10px #a2a5ac;"
        >
            <form method="post">
                <!-- Pseudo -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" placeholder="Pseudo" name="pseudo"
                        aria-describedby="basic-addon1">
                </div>

                <!-- Mot de passe -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp"
                        aria-describedby="basic-addon1">
                </div>
        </div>
        <br>
        <!-- Bouton -->
        <div style="text-align:center;">
            <input type="submit" class="btn btn-success" name="submit" value="Se connecter"><br><br>
        </div>
        <div style="float:left;">
            Vous n'avez pas de compte ? <i class="fas fa-chevron-circle-right"></i>
            <a class="tab-link" href="inscription.php">Cliquez ici</a>
        </div>
        <br>
        <a href="../index.php" style="float:left;" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-return-left"></i></a>

    </div>

    </form>

</body>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';

    require_once '../head.php'
?>