<?php
include("views/parts/admin_header.php");
?>

<main id="admin_homepage" class="admin">

    <div class="admin_bloc d-flex justify-content-center align-items-center">
        <section class="admin_main_section">

            <div class="d-flex justify-content-center mb-5">

                <?php if (isset($_GET["acces"]) && $_GET["acces"] == "interdit") : ?>

                    <span class="error access_refused align-self-center p-3">Accès interdit. Accès autorisé avec un compte administrateur seulement.</span>

                <?php endif; ?>

            </div>

            <div class="blurred_card d-flex flex-column justify-content-center align-items-center">

                <h2>GÉRER LE CONTENU DU MENU</h2>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <a href="admin-menu" class="admin_button btn btn-primary align-self-center rounded-0 mb-4">MODIFIER LE MENU</a>

                    <a href="admin-menu-ajout" class="admin_button btn btn-primary align-self-center rounded-0 mb-4">AJOUTER UN PLAT</a>

                    <a href="admin-categorie-ajout" class="admin_button btn btn-primary align-self-center rounded-0">AJOUTER UNE CATÉGORIE</a>
                </div>

            </div>

        </section>
    </div>

</main>

<?php
include("views/parts/admin_footer.php");
?>