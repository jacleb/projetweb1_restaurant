<?php
include("views/parts/header.php");
?>

<main id="menu_page">

    <section id="carouselExampleDark" class="menu_carousel carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-caption d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="carousel_bloc d-flex d-block d-lg-none">
                        <div class="carousel_small_title mb-5">
                            <h1 class="text-start">C'EST L'HEURE</h1>
                            <h1 class="text-start">DU BON GOÛT</h1>
                        </div>
                    </div>

                    <div class="carousel_bloc d-flex d-none d-lg-block">
                        <div class="d-flex align-items-center flex-wrap">
                            <h1>C'EST L'HEURE</h1>
                            <h1 class="bold_title text-start">DU BON GOÛT</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-item active" data-bs-interval="6000">
                <img src="public/media/images/bg_menu_carousel_1.webp" class="d-block w-100 h-100" alt="Image d'un repas: un verre de bière avec un steak flambé">
            </div>

            <div class="carousel-item" data-bs-interval="6000">
                <img src="public/media/images/bg_menu_carousel_2.webp" class="d-block w-100 h-100" alt="Image d'une entrée: un plat de calamar avec une trempette">
            </div>

            <div class="carousel-item" data-bs-interval="6000">
                <img src="public/media/images/bg_menu_carousel_3.webp" class="d-block w-100 h-100" alt="Image d'un dessert: gâteau au fromage et caramel">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </section>

    <section class="menu_img_bloc1 d-flex align-items-center justify-content-between">
        <div class="menu_img_container d-flex flex-column align-items-center justify-content-center">

            <section class="menu_images d-flex flex-wrap justify-content-between">
                <figure class="menu_img">
                    <img class="menu_item_img img-fluid" src="public/media/images/potage_du_moment.jpg">
                    <figcaption class="menu_item_title">
                        <p>POTAGE DU MOMENT</p>
                    </figcaption>
                </figure>

                <figure class="menu_img">
                    <img class="menu_item_img img-fluid" src="public/media/images/tartare_boeuf.jpg">
                    <figcaption class="menu_item_title">
                        <p>TARTARE DE BOEUF</p>
                    </figcaption>
                </figure>

                <figure class="menu_img">
                    <img class="menu_item_img img-fluid" src="public/media/images/brownie.jpg">
                    <figcaption class="menu_item_title">
                        <p>BROWNIE</p>
                    </figcaption>
                </figure>
            </section>

        </div>
    </section>

    <?php foreach ($categories as $category) : ?>

        <div class="list_container d-flex flex-column align-items-center justify-content-center">
            <section class="list">
                <div class="list_title d-flex mb-5">
                    <h2 class="align-self-center ps-5 mb-0"><?= mb_strtoupper($category["name"]) ?></h2>
                </div>

                <?php foreach ($dishes as $dish) : ?>

                    <?php if ($category["id"] == $dish["category_id"]) : ?>

                        <div class="d-flex flex-column px-5 pb-5">
                            <div class="d-flex justify-content-between">
                                <h4 class="pb-2"><?= mb_strtoupper($dish["title"]) ?></h4>
                                <p><?= number_format((float)($dish["price"]), 2) . "$" ?></p>
                            </div>

                            <p class="list_description"><?= $dish["description"] ?></p>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </section>
        </div>

    <?php endforeach; ?>

    <section class="menu_img_bloc2 d-flex align-items-center justify-content-between">
        <div class="menu_img_container d-flex flex-column align-items-center justify-content-center">

            <section class="menu_images d-flex flex-wrap justify-content-between">
                <figure class="menu_img">
                    <img class="menu_item_img" src="public/media/images/nachos.jpg">
                    <figcaption class="menu_item_title">
                        <p>NACHOS</p>
                    </figcaption>
                </figure>

                <figure class="menu_img">
                    <img class="menu_item_img" src="public/media/images/salade_grecque.jpg">
                    <figcaption class="menu_item_title">
                        <p>SALADE GRECQUE</p>
                    </figcaption>
                </figure>

                <figure class="menu_img">
                    <img class="menu_item_img" src="public/media/images/cupcake_ferrero.jpg">
                    <figcaption class="menu_item_title">
                        <p>CUPCAKE STYLE FERRERO</p>
                    </figcaption>
                </figure>
            </section>

        </div>
    </section>

    <?php
    include("views/parts/newsletter_section.php");
    ?>

</main>

<?php
include("views/parts/footer.php");
?>