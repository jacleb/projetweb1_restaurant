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
    <link rel="stylesheet" href="public/css/public_style.css">
    <title><?= $title ?? "PUB-G4" ?></title>
</head>
<body>
    <header>

        <?php if($title != "Erreur 404") : ?>
            <nav class="header_nav navbar navbar-expand-lg fixed-top" v-if="">
                <div class="container-fluid">

                    <a href="index" class="link_border d-flex navbar-brand me-4 me-xl-5 p-0">
                        <img class="nav_logo" src="public/media/logo/logo.png" alt="Logo PUB G4">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse bg-dark p-1" id="navbarSupportedContent">
                        
                        <div class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a href="index" class="link_border nav-link me-4 me-xl-5 px-3 <?php if($link == "accueil") { echo "active_link";}?> aria-current="page">ACCUEIL</a>

                            <a href="a-propos" class="link_border nav-link me-4 me-xl-5 px-3 <?php if($link == "a-propos") { echo "active_link";}?>">À PROPOS</a>

                            <a class="link_border nav-link me-4 me-xl-5 px-3 <?php if($link == "menu") { echo "active_link";}?>" href="menu">MENU</a>

                            <a href="contact" class="link_border nav-link me-4 me-xl-5 px-3 <?php if($link == "contact") { echo "active_link";}?>">CONTACT</a>
                        </div>

                        <div class="d-flex align-self-center">
                            <a href="https://www.facebook.com/" class="link_border me-1"><img class="social_icon" src="public/media/icons/facebook.png" alt="Icône Facebook"></a>

                            <a href="https://www.instagram.com/" class="link_border me-1"><img class="social_icon" src="public/media/icons/instagram.png" alt="Icône Instagram"></a>
                            
                            <a href="https://twitter.com/" class="link_border"><img class="social_icon" src="public/media/icons/twitter.png" alt="Icône Twitter"></a>
                        </div>

                    </div>

                </div>
            </nav>
        <?php endif; ?>

    </header>

    