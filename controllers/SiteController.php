<?php

require_once("bases/Controller.php");
require_once("classes/Redirection.php");
require_once("models/Users.php");
require_once("models/Dishes.php");
require_once("models/Categories.php");
require_once("models/NewsletterSubscriptions.php");


class SiteController extends Controller {

// PUBLIC WEBSITE ------------------------
    
    /**
     * Displays the homepage
     *
     * @return void
     */
    public function displayHomepage(){
        $title = "ACCUEIL | PUB G4";
        $link = "accueil";
        
        include("views/homepage.view.php");
    }

     /**
     * Displays the about page
     *
     * @return void
     */
    public function displayAboutPage(){
        $title = "À PROPOS | PUB G4";
        $link = "a-propos";

        include("views/about.view.php");
    }
    
     /**
     * Displays the menu page
     *
     * @return void
     */
    public function displayMenuPage(){
        $title = "MENU | PUB G4";
        $link = "menu";

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves all the categories
        $categories = $model_categories->allOrderById();

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();

        // Retrieves all the dishes
        $dishes = $model_dishes->allDishes();

        include("views/menu.view.php");
    }

     /**
     * Displays the contact page
     *
     * @return void
     */
    public function displayContactPage(){
        $title = "CONTACT | PUB-G4";
        $link = "contact";
        
        include("views/contact.view.php");
    }

// NEWSLETTER ------------------------

    public function subscribeToNewsletterSubmit(){
        // Validation of the field
        if( ! $this->validateFields(["email"])){
            Redirection::redirect("index", ["inscription" => "erreur"]);   
        }
     
        $email = $_POST["email"];

        // Instantiation of a NewsletterSubscriptions model
        $model_newsletter_subscriptions = new NewsletterSubscriptions();

        // Adds a new subscriber (inserts in the DB), if successful, redirects to the index page with success message, if not, redirects to index with error message
        $model_newsletter_subscriptions->subscribeToNewsletter($email) ? 
        Redirection::redirect("index", ["inscription" => "succes"]) : 
        Redirection::redirect("index", ["inscription" => "erreur"]);

    }

// ADMIN WEBSITE ------------------------

     /**
     * Displays the Admin login page
     *
     * @return void
     */
    public function displayLoginPage(){
        $title = "CONNEXION | ADMIN- PUB-G4";
        include("views/admin-login.view.php");
    }

     /**
     * Displays the Admin homepage page
     *
     * @return void
     */
    public function displayAdminHomepage(){
        $title = "ACCUEIL | ADMIN- PUB-G4";
        $link = "accueil";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);

        include("views/admin-homepage.view.php");
    }

     /**
     * Displays the Admin menu page
     *
     * @return void
     */
    public function displayAdminMenuPage(){
        $title = "MENU | ADMIN- PUB-G4";
        $link = "menu";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves all the categories
        $categories = $model_categories->allOrderById();

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();

        // Retrieves all the dishes
        $dishes = $model_dishes->allDishes();

        include("views/admin-menu.view.php");
    }

     /**
     * Displays the Admin users page
     *
     * @return void
     */
    public function displayAdminUsersPage(){
        $title = "UTILISATEURS | ADMIN - PUB G4";
        $link = "utilisateurs";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }
        
        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }
        
        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();
        
        // Retrieves the connected user
        $user = $model_users->byId($id);

        // Instantiation of a Users model
        $model_employees = new Users();

        // Retrieves all the users (employees)
        $employees = $model_employees->all();

        include("views/admin-users.view.php");
    }

// LOGIN ----------------------

     /**
     * Processes the account connection information
     *
     * @return void
     */
    public function loginSubmit(){
        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin");

        // Validation of the fields
        if( ! $this->validateFields(["email", "password"])){
            Redirection::redirect("admin", ["connexion" => "erreur"]);       
        }

        // Instantiation of a Users model
        $model_users = new Users();
    
        // Creates a new user (inserts in the DB), if successful, redirects to admin, if not, redirects to index page with error message
        $model_users->verify($_POST["email"], $_POST["password"]) ? 
            Redirection::redirect("admin-accueil") : 
            Redirection::redirect("admin", ["connexion" => "erreur"]);    
    }

// USERS - ADD/MODIFY/DELETE ----------------------

     /**
     * Displays the user account creation page
     *
     * @return void
     */
    public function addUser(){
        $title = "UTILISATEURS | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);
        
        include("views/admin-users-add.view.php");
    }

     /**
     * Processes the information submitted during the user's account creation
     *
     * @return void
     */
    public function addUserSubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-utilisateurs-ajout");

        // Validation of the fields
        if( ! $this->validateFields(["first_name", "last_name", "email", "password"])){
            Redirection::redirect("admin-utilisateurs-ajout", ["ajout" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["first_name"], 150, "admin-utilisateurs-ajout");
        $this->verifyCharacterLimit($_POST["last_name"], 150, "admin-utilisateurs-ajout");
        $this->verifyCharacterLimit($_POST["email"], 255, "admin-utilisateurs-ajout");
        $this->verifyCharacterLimit($_POST["password"], 255, "admin-utilisateurs-ajout");

        // Retrieves the information
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Adds a new user (inserts in the DB), if successful, redirects to the admin-users page with success message, if not, redirects to admin-users-add page with error message
        $model_users->addNewUser($first_name, $last_name, $email, $password) ?
            Redirection::redirect("admin-utilisateurs", ["ajout" => "succes"]) : 
            Redirection::redirect("admin-utilisateurs-ajout", ["ajout" => "erreur"]);
    }

    /**
     * Displays the user account modification page
     *
     * @return void
     */
    public function modifyUser(){
        $title = "UTILISATEURS | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);
        
        // Retrieves the employee's id
        $employee_id = $_GET["id"];

        // Instantiation of a Users model
        $model_employees = new Users();

        // Retrieves the user (employee)
        $employee = $model_employees->byId($employee_id);

        include("views/admin-users-modify.view.php");
    }
    
    /**
     * Processes the information submitted during the user's account modification
     *
     * @return void
     */
    public function modifyUserSubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 
        
        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-utilisateurs-modification");
        

        // Validation of the fields
        if( ! $this->validateFields(["id", "first_name", "last_name", "email"])){
            Redirection::redirect("admin-utilisateurs-modification", ["id" => $_POST["id"], "modification" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["first_name"], 150, "admin-utilisateurs-modification", true);
        $this->verifyCharacterLimit($_POST["last_name"], 150, "admin-utilisateurs-modification", true);
        $this->verifyCharacterLimit($_POST["email"], 255, "admin-utilisateurs-modification", true);
     
        // Retrieves the information
        $id = $_POST["id"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Modifies an exisiting user and updates the entry in the DB. If successful, redirects to the admin-users page with success message, if not, redirects to the admin-users-modify page with error message
        $model_users->modifyExistingUser($id, $first_name, $last_name, $email) ?
            Redirection::redirect("admin-utilisateurs", ["modification" => "succes"]) : 
            Redirection::redirect("admin-utilisateurs-modification", ["id" => $id, "modification" => "erreur"]);
    }

    /**
     * Deletes the specific user
     *
     * @return void
     */
    public function deleteUser(){
        $title = "UTILISATEURS | ADMIN - PUB G4";

        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Validates that the admin (Gaston) is connected, if not redirects to admin-homepage page
        if($_SESSION["user_id"] != 1) {
            Redirection::redirect("admin-accueil", ["acces" => "interdit"]);
        }
                
        // Retrieves the user's id
        $user_id = $_GET["id"];

        // Instantiation of a Users model
        $model_users = new Users();
        
        // Deletes the user from the DB, if successful, redirects to admin-users page with success message, if not, redirects to admin-users page with error message
        $model_users->delete($user_id) ?
        Redirection::redirect("admin-utilisateurs", ["suppression" => "succes"]) : 
        Redirection::redirect("admin-utilisateurs", ["suppression" => "erreur"]);
    }

// DISHES - ADD/MODIFY/DELETE ----------------------

     /**
     * Displays the user account creation page
     *
     * @return void
     */
    public function addDish(){
        $title = "MENU | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();
        
        // Retrieves the connected user
        $user = $model_users->byId($id);

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves all the categories
        $categories = $model_categories->allOrderById();
                
        include("views/admin-menu-add.view.php");
    }

     /**
     * Processes the information submitted during the adding of the dish
     *
     * @return void
     */
    public function addDishSubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-menu-ajout");

        // Validation of the fields
        if( ! $this->validateFields(["title", "description", "price", "category"])){
            Redirection::redirect("admin-menu-ajout", ["ajout" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["title"], 50, "admin-menu-ajout");
        $this->verifyCharacterLimit($_POST["description"], 200, "admin-menu-ajout");
     
        // Retrieves the information
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = number_format((float)(str_replace(",", ".", $_POST["price"])), 2);
        $category = $_POST["category"];

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();

        // Adds a new dish (inserts in the DB), if successful, redirects to the admin-menu page with success message, if not, redirects to admin-menu-add page with error message
        $model_dishes->addNewDish($title, $description, $price, $category) ?
            Redirection::redirect("admin-menu", ["ajout" => "succes"]) : 
            Redirection::redirect("admin-menu-ajout", ["ajout" => "erreur"]);
    }

    /**
     * Displays the menu dish modification page
     *
     * @return void
     */
    public function modifyDish(){
        $title = "MENU | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);
        
        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves all the categories
        $categories = $model_categories->allOrderById();

        // Retrieves the dish's id
        $dish_id = $_GET["id"];

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();

        // Retrieves the dish
        $dish = $model_dishes->byId($dish_id);
        $selected_category = $model_categories->byId($dish["category_id"]);

        include("views/admin-menu-modify.view.php");
    }

    /**
     * Processes the information submitted during the dish's modification
     *
     * @return void
     */
    public function modifyDishSubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-menu-modification");
        
        // Validation of the fields
        if( ! $this->validateFields(["id", "title", "description", "price", "category"])){
            Redirection::redirect("admin-menu-modification", ["id" => $_POST["id"], "modification" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["title"], 50, "admin-menu-modification");
        $this->verifyCharacterLimit($_POST["description"], 200, "admin-menu-modification");
     
        // Retrieves the information
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = number_format((float)(str_replace(",", ".", $_POST["price"])), 2);
        $category = $_POST["category"];

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();

        // Modifies an exisiting dish and updates the entry in the DB. If successful, redirects to the admin-menu page with success message, if not, redirects to the admin-menu-modify page with error message
        $model_dishes->modifyExistingDish($id, $title, $description, $price, $category) ?
            Redirection::redirect("admin-menu", ["modification" => "succes"]) : 
            Redirection::redirect("admin-menu-modification", ["id" => $id, "modification" => "erreur"]);
    }

    /**
     * Deletes the dish
     *
     * @return void
     */
    public function deleteDish(){
        $title = "MENU | ADMIN - PUB G4";

        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Retrieves the dish's id
        $dish_id = $_GET["id"];

        // Instantiation of a Dishes model
        $model_dishes = new Dishes();
        
        // Deletes the dish from the DB, if successful, redirects to admin-menu page with success message, if not, redirects to admin-menu page with error message
        $model_dishes->delete($dish_id) ?
        Redirection::redirect("admin-menu", ["suppression" => "succes"]) : 
        Redirection::redirect("admin-menu", ["suppression" => "erreur"]);
    }

// CATEGORIES - ADD/MODIFY/DELETE ----------------------

     /**
     * Displays the user account creation page
     *
     * @return void
     */
    public function addCategory(){
        $title = "MENU | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves all the categories
        $categories = $model_categories->all();      
        
        include("views/admin-category-add.view.php");
    }

     /**
     * Processes the information submitted during the adding of the category
     *
     * @return void
     */
    public function addCategorySubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-categorie-ajout");

        // Validation of the fields
        if( ! $this->validateFields(["category"])){
            Redirection::redirect("admin-categorie-ajout", ["ajout" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["category"], 25, "admin-categorie-ajout");
     
        // Retrieves the information
        $category = $_POST["category"];

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Adds a new category (inserts in the DB), if successful, redirects to the admin-menu page with success message, if not, redirects to admin-category-add page with error message
        $model_categories->addNewCategory($category) ?
            Redirection::redirect("admin-menu", ["ajout-categorie" => "succes"]) : 
            Redirection::redirect("admin-categorie-ajout", ["ajout" => "erreur"]);
    }


    /**
     * Displays the menu dish modification page
     *
     * @return void
     */
    public function modifyCategory(){
        $title = "MENU | ADMIN - PUB G4";

        // Validation of the user's connection
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        }

        // Retrieves the user's id
        $id = $_SESSION["user_id"];

        // Instantiation of a Users model
        $model_users = new Users();

        // Retrieves the connected user
        $user = $model_users->byId($id);
        
        // Retrieves the category's id
        $category_id = $_GET["id"];

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Retrieves the category
        $category = $model_categories->byId($category_id);

        include("views/admin-category-modify.view.php");
    }

    /**
     * Processes the information submitted during the category's modification
     *
     * @return void
     */
    public function modifyCategorySubmit(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Prevents the browser from visiting the route without submitting the form
        $this->validateFormReception("admin-categorie-modification");
        
        // Validation of the fields
        if( ! $this->validateFields(["category"])){
            Redirection::redirect("admin-categorie-modification", ["id" => $_POST["id"], "modification" => "erreur"]);   
        }
        
        // Verification of the character limit
        $this->verifyCharacterLimit($_POST["category"], 25, "admin-categorie-modification");
     
        // Retrieves the information
        $id = $_POST["id"];
        $category = $_POST["category"];

        // Instantiation of a Categories model
        $model_categories = new Categories();

        // Modifies an exisiting dish and updates the entry in the DB. If successful, redirects to the admin-menu page with success message, if not, redirects to the admin-category-modify page with error message
        $model_categories->modifyExistingCategory($id, $category) ?
            Redirection::redirect("admin-menu", ["modification-categorie" => "succes"]) : 
            Redirection::redirect("admin-categorie-modification", ["id" => $id, "modification" => "erreur"]);
    }

    /**
     * Deletes the category
     *
     * @return void
     */
    public function deleteCategory(){
        $title = "MENU | ADMIN - PUB G4";

        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("index", ["connexion" => "erreur"]);
        } 

        // Retrieves the category's id
        $category_id = $_GET["id"];

        // Retrieves the category
        $model_categories = new Categories();
        
        // Deletes the category from the DB, if successful, redirects to admin-menu page with success message, if not, redirects to admin-menu page with error message
        $model_categories->delete($category_id) ?
        Redirection::redirect("admin-menu", ["suppression-categorie" => "succes"]) : 
        Redirection::redirect("admin-menu", ["suppression" => "erreur"]);
    }

// LOGOUT ----------------------

    public function logout(){
        // Prevents the browser from visiting the route if the user is not connected
        if( ! $this->validateConnection("user_id")) {
            Redirection::redirect("admin", ["connexion" => "erreur"]);
        } 

        $_SESSION["user_id"] = null;
        
        //Redirects to public website if successful with get parameters confirming the user has logged out successfully
        Redirection::redirect("index", [ "deconnexion" => "succes"]);
    }
}