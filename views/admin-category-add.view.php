<?php
include("views/parts/admin_header.php");
?>

<main id="admin_form_page" class="admin">
    <div class="admin_bloc d-flex flex-column align-items-center">

        <div class="bg_black p-5 m-5">

            <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                <h3 class="align-self-start">AJOUTER UNE CATÉGORIE</h3>
                <a href="admin-menu" class="admin_button align-self-end btn btn-primary rounded-0 mb-5">RETOUR</a>
            </div>

            <form action="admin-categorie-soumettre" method="post">

                <div class="d-flex mb-5">
                    <div class="form_new_category d-flex flex-wrap">

                        <label class="mb-2" for="category">NOM DE LA CATÉGORIE</label>
                        <input type="text" name="category" class="form-control rounded-0 px-3" id="category" placeholder="Maximum 25 caractères">

                    </div>
                </div>

                <div class="d-flex justify-content-end">

                    <?php if (isset($_GET["ajout"]) && $_GET["ajout"] == "erreur") : ?>

                        <span class="error align-self-center text-end me-5">Erreur! Il manque une information. Veuillez remplir le champs correctement.</span>

                    <?php elseif (isset($_GET["limite-caracteres"]) && $_GET["limite-caracteres"] == "depasser") : ?>

                        <span class="error align-self-center text-end me-5">Erreur! La limite de caractères a été dépassé pour le champs.<br> Limite de 25 caractères.</span>

                    <?php endif; ?>

                    <button type="submit" class="admin_button btn btn-primary align-self-center rounded-0">AJOUTER</button>
                </div>
                
            </form>

        </div>

    </div>
</main>

<?php
include("views/parts/admin_footer.php");
?>