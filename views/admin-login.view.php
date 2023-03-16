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

            <div class="d-flex justify-content-start align-items-center">
                <a class="link_border d-flex navbar-brand me-lg-4 me-xl-5 p-0" href="index">
                    <img class="nav_logo" src="public/media/logo/logo.png" alt="Logo PUB G4">
                </a>

                <div>
                    <?php if (isset($_GET["connexion"]) && $_GET["connexion"] == "erreur") : ?>

                        <span class="error align-self-center text-end">Connexion échouée. Veuillez entrer un courriel et un mot de passe valide.</span>

                    <?php endif; ?>
                </div>

            </div>

        </nav>
    </header>

    <main id="admin_login_page" class="admin">

        <div class="admin_bloc container d-flex justify-content-center align-items-center">
            <section class="admin_main_section d-flex flex-nowrap justify-content-center">

                <div class="align-self-center d-none d-lg-block">
                    <span>
                        <h1 class="text-center">D'ABORD LE TRAVAIL, ENSUITE LE JEU</h1>
                    </span>
                </div>

                <div class="blurred_card d-flex justify-content-center align-items-center ms-0 ms-lg-5">
                    <div>

                        <form action="admin-connexion-soumettre" method="post">

                            <div>
                                <label for="username" class="form-label">ADRESSE COURRIEL</label>
                                <input type="text" class="form-control rounded-0" name="email" id="email" placeholder="adresse courriel" autofocus>
                            </div>

                            <div class="my-5">
                                <label for="password" class="form-label">MOT DE PASSE</label>
                                <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="Password">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="admin_button btn btn-primary align-self-center rounded-0">SE CONNECTER</button>
                            </div>
                            
                        </form>

                    </div>
                </div>

            </section>
        </div>

    </main>

    <?php
    include("views/parts/admin_footer.php");
    ?>