<!doctype html>
<html lang="fr" class="h-100">

<?php
global $root;
$root = $_SERVER["DOCUMENT_ROOT"] . '/ogites2/';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <?php
    // Définition du titre de la page
    global $title;
    if($title == "")
    {
    ?>
    <title>Ô'GÎTES</title>
    <?php
    }
    else
    {
    ?>
    <title><?php echo $title; ?></title>
    <?php
    }
    ?>
    <!-- Icone de l'équipe -->
    <link rel="icon" href="/ogites2/images/new-logo.png">
     <!-- Bootstrap core CSS -->
    <link href="/ogites2/assets/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    //echo $root . 'login-system/config.php';
    // Connexion à la base données
    require_once 'login-system/config.php';
    ?>
  
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="/ogites2/css/custom.css" rel="stylesheet">
    <link href="/ogites2/css/main.css" rel="stylesheet">
    <link href="/ogites2/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ogites2/scss/slideshow.scss" />
</head>

<body class="d-flex flex-column h-100">
  