<?php
include("views/parts/admin_header.php");
?>

<div id="admin_list_page" class="admin">

    <div class="list_container d-flex flex-column">
        
        <div class="d-flex justify-content-end align-items-center">

            <?php if (isset($_GET["ajout"]) && $_GET["ajout"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">Un nouvel utilisateur a été ajouté!</span>
                </div>

            <?php elseif (isset($_GET["modification"]) && $_GET["modification"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">L'utilisateur a été modifié avec succès!</span>
                </div>
                
            <?php elseif (isset($_GET["suppression"]) && $_GET["suppression"] == "succes") : ?>

                <div class="mb-5 me-5">
                    <span class="success">L'utilisateur a été supprimé avec succès!</span>
                </div>

            <?php elseif (isset($_GET["suppression"]) && $_GET["suppression"] == "erreur") : ?>

                <div class="mb-5 me-5">
                    <span class="error">Un problème est survenu. L'utilisateur n'a pas été supprimé.</span>
                </div>
                
            <?php endif; ?>

            <a href="admin-utilisateurs-ajout" class="admin_button align-self-end btn btn-primary rounded-0 mb-5">AJOUTER UN UTILISATEUR</a>
        
        </div>

        <section class="list">

            <div class="list_title d-flex">
                <h2 class="align-self-center ps-5 mb-0">LES UTILISATEURS</h2>
            </div>

            <?php foreach ($employees as $employee) : ?>

                <div class="list_entry d-flex flex-column px-5 py-5">
                    <div class="d-flex justify-content-start">
                        <h4 class="pb-2"><?= $employee["first_name"] . " " . $employee["last_name"] ?></h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="list_description"><?= $employee["email"] ?></p>
                        <div class="d-flex justify-content-center align-items-end">
                            <a href="admin-utilisateurs-modification?id=<?= $employee["id"] ?>" class="link_border modify_button me-4 px-3">modifier</a>
                            <a href="admin-utilisateurs-suppression?id=<?= $employee["id"] ?>" id="delete_button" class="link_border px-3">supprimer</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </section>

    </div>

</div>

<?php
include("views/parts/admin_footer.php");
?>