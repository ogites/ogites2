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

    <link rel="stylesheet" href="admin_style.css">

    <title>Ô'GÎTES</title>

     <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    //echo $root . 'login-system/config.php';
    // Connexion à la base données
    require_once '../login-system/config.php';
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
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../scss/slideshow.scss" />
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
 
    <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
</head>

<body class="d-flex flex-column h-100">
  