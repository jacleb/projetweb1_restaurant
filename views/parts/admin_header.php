<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.typekit.net/fjm3qcm.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/admin_style.css">
    <title><?= $title ?? "ADMIN | PUB G4" ?></title>
</head>
<body>
    <header id="admin_header">

        <nav class="header_nav navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">

                <a class="link_border d-flex navbar-brand me-lg-4 me-xl-5 p-0" href="index">
                    <img class="nav_logo" src="public/media/logo/logo.png" alt="Logo PUB G4">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse bg-dark p-1" id="navbarSupportedContent">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <a href="admin-accueil" class="link_border nav-link me-lg-4 me-xl-5 px-3 <?php if($link == "accueil") { echo "active_link";}?>">ACCUEIL</a>
                        
                        <a href="admin-menu" class="link_border nav-link me-lg-4 me-xl-5 px-3 <?php if($link == "menu") { echo "active_link";}?>">MENU</a>
                        
                        <?php if($user["id"] == 1) : ?>

                            <a href="admin-utilisateurs" class="link_border nav-link me-lg-4 me-xl-5 px-3 <?php if($link == "utilisateurs") { echo "active_link";}?>">UTILISATEURS</a>
                        
                        <?php endif; ?>

                    </div>

                    <div class="d-flex align-self-center">

                        <div class="d-flex align-self-center"">
                            <img class="social_icon align-self-start" src="public/media/icons/user.png" alt="Icône utilisateur">
                            <span class="user_name px-3"><?= strtoupper($user["first_name"]) ?></span>
                        </div>

                        <a href="deconnexion" class="link_border nav-link ms-lg-4 ms-xl-5 px-3 py-2">DÉCONNEXION</a>
                    
                    </div>
                </div>

            </div>
        </nav>

    </header>