<?php

// Associative array that associates a route to a method in the controller
// Structure: "name of the route" => "name of the method"

$routes = [
    "index" => "displayHomepage",
    "a-propos" => "displayAboutPage",
    "menu" => "displayMenuPage",
    "contact" => "displayContactPage",

    "abonnement-infolettre-soumettre" => "subscribeToNewsletterSubmit",

    "admin" => "displayLoginPage",
    "admin-accueil" => "displayAdminHomepage",
    "admin-menu" => "displayAdminMenuPage",
    "admin-utilisateurs" => "displayAdminUsersPage",

    "admin-connexion-soumettre" => "loginSubmit",

    "admin-utilisateurs-ajout" => "addUser",
    "admin-utilisateurs-ajout-soumettre" => "addUserSubmit",
    
    "admin-utilisateurs-modification" => "modifyUser",
    "admin-utilisateurs-modification-soumettre" => "modifyUserSubmit",

    "admin-utilisateurs-suppression" => "deleteUser",

    "admin-menu-ajout" => "addDish",
    "admin-menu-ajout-soumettre" => "addDishSubmit",

    "admin-menu-modification" => "modifyDish",
    "admin-menu-modification-soumettre" => "modifyDishSubmit",

    "admin-menu-suppression" => "deleteDish",

    "admin-categorie-ajout" => "addCategory",
    "admin-categorie-soumettre" => "addCategorySubmit",
    
    "admin-categorie-modification" => "modifyCategory",
    "admin-categorie-modification-soumettre" => "modifyCategorySubmit",

    "admin-categorie-suppression" => "deleteCategory",
    
    "deconnexion" => "logout"
];