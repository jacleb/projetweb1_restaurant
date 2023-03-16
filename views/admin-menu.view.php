<?php
include("views/parts/admin_header.php");
?>

<main id="admin_list_page" class="admin">

    <div class="list_container d-flex flex-column">

        <div class="d-flex justify-content-end align-items-center">
            <a href="admin-menu-ajout" class="admin_button align-self-end btn btn-primary rounded-0 mb-4">AJOUTER UN PLAT</a>
        </div>

        <div class="d-flex justify-content-end align-items-center">

            <?php if (isset($_GET["ajout-categorie"]) && $_GET["ajout-categorie"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">Une nouvelle catégorie a été ajoutée au menu!</span>
                </div>

            <?php elseif (isset($_GET["ajout"]) && $_GET["ajout"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">Un nouveau plat a été ajouté au menu!</span>
                </div>

            <?php elseif (isset($_GET["modification-categorie"]) && $_GET["modification-categorie"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">La catégorie a été modifiée avec succès!</span>
                </div>

            <?php elseif (isset($_GET["modification"]) && $_GET["modification"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">Le plat a été modifié avec succès!</span>
                </div>

            <?php elseif (isset($_GET["suppression-categorie"]) && $_GET["suppression-categorie"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">La catégorie a été supprimée avec succès!</span>
                </div>

            <?php elseif (isset($_GET["suppression"]) && $_GET["suppression"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">Le plat a été supprimé avec succès!</span>
                </div>

            <?php elseif (isset($_GET["suppression"]) && $_GET["suppression"] == "erreur") : ?>

                <div class="mb-5 me-5">
                    <span class="error">Un problème est survenu. Le plat n'a pas été supprimé.</span>
                </div>

            <?php endif; ?>

            <a href="admin-categorie-ajout" class="admin_button align-self-end btn btn-primary rounded-0 mb-5">AJOUTER UNE CATÉGORIE</a>

        </div>

        <?php foreach ($categories as $category) : ?>

            <section class="list">
                <div class="list_title d-flex justify-content-between px-5">
                    <h2 class="align-self-center mb-0"><?= mb_strtoupper($category["name"]) ?></h2>

                    <div class="d-flex justify-content-center align-items-center">
                        <a href="admin-categorie-modification?id=<?= $category["id"] ?>" id="category_modify_button" class="me-4 px-3">modifier</a>
                        <a href="admin-categorie-suppression?id=<?= $category["id"] ?>" id="category_delete_button" class="px-3">supprimer</a>
                    </div>
                </div>

                <?php foreach ($dishes as $dish) : ?>

                    <?php if ($category["id"] == $dish["category_id"]) : ?>

                        <div class="list_entry d-flex flex-column px-5 py-5">

                            <div class="d-flex justify-content-between">
                                <h4 class="pb-2"><?= mb_strtoupper($dish["title"]) ?></h4>
                                <p><?= number_format((float)($dish["price"]), 2) . "$" ?></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="list_description"><?= $dish["description"] ?></p>
                                <div class="d-flex justify-content-center align-items-end">
                                    <a href="admin-menu-modification?id=<?= $dish["id"] ?>" class="link_border modify_button me-4 px-3">modifier</a>
                                    <a href="admin-menu-suppression?id=<?= $dish["id"] ?>" id="delete_button" class="link_border px-3">supprimer</a>
                                </div>
                            </div>
                            
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </section>

        <?php endforeach; ?>

    </div>

    <?php
    include("views/parts/admin_footer.php");
    ?>