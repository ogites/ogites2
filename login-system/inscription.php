<?php
/*
    Script d'inscription au site
*/
//  Lien avec la base de donnée
require_once 'config.php';

if(isset($_POST['submit']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $tel = $_POST['tel'];

    //Chiffrage du mot de passe
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $mdp_confirm = password_hash($_POST['mdp_confirm'], PASSWORD_DEFAULT);

    //Définir la date
    date_default_timezone_set('America/Guadeloupe');
    
    //Verification des champs
    if((!empty($pseudo)) && (!empty($nom)) && (!empty($prenom)) && (!empty($email))&& (!empty($tel)) && (!empty($mdp)) && (!empty($mdp_confirm))) 
    {
        //Vérification du pseudo
        if(strlen($pseudo) > 1 AND strlen($pseudo) <= 20)
        {
            //Vérification de l'email
            if (preg_match("!^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$!", $email)) 
            {
                

                //Verification du mot de passe 
                if($_POST['mdp'] == $_POST['mdp_confirm']) 
                {

                    // Vérifier si l'inscription est valide
                    if(verif("inscription"))
                    {
                        $messageReussi = "Inscription réussi, patientez un instant...";
                        header('refresh:3; url=connexion.php');
                    }

                } 
                else 
                {
                    $erreurMessage = "Mauvais mot de passe. Réessayer !";
                }
               
                    
            } 
            else 
            {
                $erreurMessage = "Votre adresse mail n'est pas valide. Réessayer !";
            }
        } 
        else 
        {
            $erreurMessage = "Votre pseudo doit être compris entre 0 et 15 caractères";
        }
    } 
    else 
    {
        $erreurMessage = "Veuillez remplir tous les champs";
    }
}
?>
<title>S'inscrire - Ô'GÎTES</title>
<link rel="icon" href="/ogites2/images/new-logo.png">
<link rel="stylesheet" type="text/css" href="../scss/register.scss" />
<script src="https://kit.fontawesome.com/a076d05399.js"> </script>

<body style="padding-top:35px;">

    <div style="position: relative;
    width: 645px;
    background-color: #eaebec;
    padding: 15px;
    border-radius: 10px;
    
    ">

        <h3 style="text-align:center; margin-bottom: 15px;">
            N'attendez plus ! <br> Réservez votre gîte en créant votre compte <br>
        </h3>
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
            width: 610px;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0px 5px 10px #a2a5ac;
            height:310px;
            margin-top:20px;
            ">
            <form method="post">
                <!-- Pseudo -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" placeholder="Pseudo" name="pseudo"
                        aria-describedby="basic-addon1">
                </div>

                <!-- Nom et prénom -->
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-portrait"></i></span>
                    <input type="text" name="nom" placeholder="Nom de famille" class="form-control">
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                </div>
                <br>

                <!-- Adresse email -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Adresse email" name="email"
                        aria-describedby="basic-addon1">
                </div>

                <!-- Numero de téléphone -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                    <input type="tel" class="form-control" placeholder="Numéro de portable : 06 90 12 34 45" name="tel"
                        aria-describedby="basic-addon1" Pattern="^0[1-68]([-. ]?[0-9]{2}){4}$">
                </div>

                <!-- Mot de passe -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp"
                        aria-describedby="basic-addon1">
                </div>

                <!-- Confirmation de mot de passe -->
                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Confirmation du mot de passe"
                        name="mdp_confirm" aria-describedby="basic-addon1">
                </div>
        </div>
        <br>
        <!-- Bouton -->
        <div style="text-align:center;">
            <input type="submit" class="btn btn-success" name="submit" value="Valider">
            <a href="connexion.php" style="float:left;" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-return-left"></i></a>
        </div>

    </div>
    </form>

    </div>
</body>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';

    require_once '../head.php'
?>