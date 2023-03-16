<?php
include("views/parts/header.php");
?>

<main id="homepage">
    <div id="app">
        <section class="homepage_bloc d-flex justify-content-center">

            <?php if (isset($_GET["inscription"]) && $_GET["inscription"] == "succes") : ?>

                <div class="newsletter_message p-3">
                    <span class="success">Succès! Vous allez recevoir des nouvelles bientôt.</span>
                </div>

            <?php elseif (isset($_GET["inscription"]) && $_GET["inscription"] == "erreur") : ?>

                <div class="newsletter_message p-3">
                    <span class="error">Un problème est survenu. Veuillez réessayer!</span>
                </div>

            <?php endif; ?>

            <div class="logo_bloc align-self-center d-flex justify-content-center"><img class="header_logo align-self-center justify-content-center" src="public/media/logo/logo.png" alt="Logo PUB G4"></div>
        
        </section>

        <div class="see_more d-flex justify-content-center">
            <a href="#menu"><img class="arrow_down" src="public/media/icons/arrow_down.png" alt="Flèche dynamique dirigeant vers le bas de la page"></a>
        </div>

        <section class="intro_bloc d-flex justify-content-center">
            <div class="intro card text-center rounded-0">
                <div class="card-body p-0">

                    <h3>À PROPOS</h3>

                    <p class="card-text mb-4">Depuis maintenant 20 ans, Pub G4 vous fait découvrir des plats de tout genre avec une touche raffinée que vous n'avez goutée nulle part ailleurs. Venez entre amis, pour une soirée romantique …</p>

                    <a href="a-propos" class="btn btn-primary rounded-0">VOIR PLUS</a>

                </div>
            </div>
        </section>

        <section id="menu" class="menu_bloc d-flex">
            <a href="menu" class="blurred_card container d-flex align-self-center">

                <div class="border_decor offset-1 align-self-center"></div>

                <div class="menu_bloc_img offset-1 align-self-center">
                    <img class="menu_item_img" src="public/media/images/menu_item.jpg" alt="Image d'un plat gastronomique">
                </div>

                <div class="menu_text d-flex">
                    <h2 class="h1 align-self-center">DÉCOUVREZ NOTRE MENU RAFFINÉ</h2>
                    <img class="triple_arrows align-self-end" src="public/media/icons/arrows_right_white.png" alt="Trois flèches qui pointent vers la droite">
                </div>

            </a>
        </section>

        <section class="review_bloc d-flex justify-content-center">
            <div class="review card text-center rounded-0" v-cloak>
                <div id="app">
                    <div class="card-body p-0">
                        <h3>{{ review.title }}</h3>

                        <div v-if=" review.rating == '4'"><img class="star_rating" src="public/media/icons/4etoiles.png" alt="4 étoiles"></div>
                        <div v-if=" review.rating == '4.5'"><img class="star_rating" src="public/media/icons/4-5etoiles.png" alt="4.5 étoiles"></div>
                        <div v-if=" review.rating == '5'"><img class="star_rating" src="public/media/icons/5etoiles.png" alt=" 5 étoiles"></div>

                        <p class="card-text">{{ review.text }}</p>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include("views/parts/newsletter_section.php");
        ?>

    <div id="app">
</main>

<?php
include("views/parts/footer.php");
?>