<?php
include("views/parts/admin_header.php");
?>

<main id="admin_form_page" class="admin">
    <div class="admin_bloc d-flex flex-column align-items-center justify-content-center">

        <div class="bg_black p-5 m-5">
            <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                <h3 class="align-self-start">MODIFIER UN UTILISATEUR</h3>
                <a href="admin-utilisateurs" class="admin_button align-self-end btn btn-primary rounded-0 mb-5">RETOUR</a>
            </div>

            <form action="admin-utilisateurs-modification-soumettre" method="post" class="mt-4">
                
                <input type="hidden" name="id" value="<?= $employee["id"] ?>">

                <div class="d-flex mb-3">
                    <div class="mb-3 me-5 w-50">
                        <label for="first_name" class="form-label">PRÉNOM</label>
                        <input type="first_name" class="form-control rounded-0" name="first_name" id="first_name" value="<?= $employee["first_name"] ?>">
                    </div>

                    <div class="mb-3 w-50">
                        <label for="last_name" class="form-label">NOM</label>
                        <input type="last_name" class="form-control rounded-0" name="last_name" id="last_name" value="<?= $employee["last_name"] ?>">
                    </div>
                </div>

                <div class="d-flex mb-5">
                    <div class="w-100">
                        <label for="email" class="form-label">COURRIEL</label>
                        <input type="email" class="form-control rounded-0" name="email" id="email" value="<?= $employee["email"] ?>">
                    </div>
                </div>

                <div class="d-flex justify-content-end">

                    <?php if (isset($_GET["modification"]) && $_GET["modification"] == "erreur") : ?>
                        
                        <span class="error align-self-center text-end me-5">Erreur! Il manque des informations. Veuillez remplir tous les champs correctement.</span>
                    
                    <?php elseif (isset($_GET["limite-caracteres"]) && $_GET["limite-caracteres"] == "depasser") : ?>
                    
                        <span class="error align-self-center text-end me-5">Erreur! La limite de caractères a été dépassé pour un ou plusieurs champs.<br> Limite de 100 caractères pour le prénom et le nom. Limite de 255 caractères pour le courriel.</span>
                    
                    <?php endif; ?>

                    <button type="submit" class="admin_button btn btn-primary align-self-center rounded-0">MODIFIER</button>

                </div>
            </form>

        </div>

    </div>
</main>

<?php
include("views/parts/admin_footer.php");
?>