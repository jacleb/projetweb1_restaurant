<?php
include("views/parts/admin_header.php");
?>

<main id="admin_form_page" class="admin">
    <div class="admin_bloc d-flex flex-column align-items-center justify-content-center">

        <div class="bg_black p-5 m-5">

            <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                <h3 class="align-self-start">AJOUTER UN PLAT</h3>
                <a href="admin-menu" class="admin_button align-self-end btn btn-primary rounded-0 mb-5">RETOUR</a>
            </div>

            <form action="admin-menu-ajout-soumettre" method="post">

                <div class="d-flex justify-content-between mb-3">

                    <div class="form_title mb-3 d-flex flex-wrap">
                        <label class="mb-2" for="title">TITRE DU PLAT</label>
                        <input type="text" name="title" class="form-control rounded-0 px-3" id="title" placeholder="Maximum 50 caractères">
                    </div>

                    <div class="form_category mb-3 d-flex flex-wrap">
                        <label class="mb-2" for="categories">CATÉGORIE</label>
                        <select name="category" class="form-select rounded-0 px-3" id="categories">

                            <option selected disabled class="text-muted">Sélectionnez une option</option>

                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form_price mb-3 d-flex flex-column">
                        <label class="mb-2" for="price">PRIX</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" class="input_price rounded-0 px-3">
                    </div>

                </div>

                <div class="mb-5">
                    <label class="mb-2" for="description">DESCRIPTION</label>
                    <textarea type="text" name="description" class="form-control rounded-0 px-3" id="description" rows="2" placeholder="Maximum 160 caractères"></textarea>
                </div>

                <div class="d-flex justify-content-end">

                    <?php if (isset($_GET["ajout"]) && $_GET["ajout"] == "erreur") : ?>

                        <span class="error align-self-center text-end me-5">Erreur! Il manque des informations. Veuillez remplir tous les champs correctement.</span>

                    <?php elseif (isset($_GET["limite-caracteres"]) && $_GET["limite-caracteres"] == "depasser") : ?>

                        <span class="error align-self-center text-end me-5">Erreur! La limite de caractères a été dépassé pour un ou plusieurs champs.<br> Limite de 50 caractères pour le titre. Limite de 200 caractères pour la description.</span>

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