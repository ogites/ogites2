<?php 
    require_once '../head.php';
    session_start();
    require_once 'config.php';
    header_page(0);
?>

<script src="https://kit.fontawesome.com/a076d05399.js"> </script>

<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
        <h1>PAGE : MON COMPTE AVEC LES PARAMETRES</h1>
        <br>
		<div class="container">
        <div class="row">
            
            <div class="col-4">
            <table class="table table-striped">
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
            <?php
                if(isset($_SESSION['id_users']) AND isset($_SESSION['pseudo'])){ 
            ?>
            <table class="table table-striped table-primary">
                <thead>
                    <tr>
                        <th><h3><center>Les informations sur vous : <?php echo ucfirst($_SESSION["pseudo"]); ?></center></h3></th>
                    </tr>
                </thead>
            </table>
        
            <i class="fas fa-user"> Nom :</i><br> <?php echo ucfirst($_SESSION["nom"]); ?>
            <br><br>
            <i class="fas fa-user"> Prenom :</i><br> <?php echo ucfirst($_SESSION["prenom"]); ?>
            <br><br>
            <i class="fas fa-envelope"> Adresse mail :</i> <br><?php echo $_SESSION["email"]; ?>
            <br><br>
            
        
            <?php } ?>
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