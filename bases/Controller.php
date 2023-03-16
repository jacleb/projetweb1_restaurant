<?php

require_once("classes/Redirection.php");

abstract class Controller {
    /**
     * Constructor
     */
    public function __construct(){}

    /**
     * Displays the "Error 404" page when a page is not found.
     *
     * @return void
     */
    public function error404(){
        $title = "Erreur 404";
       include("views/error404.view.php");
    }

    /**
     *Validates the reception of a form on the route and redirects if it's not the case
     *
     * @param string $route The route for redirection
     * @return void
     */
    public function validateFormReception(string $route){
        if (empty($_POST)) {
            Redirection::redirect($route);
        }
    }

    /**
     * Validates that all the fields are filled
     *
     * @param array $fields Indexed array containing the name of the fields
     * @return bool
     */
    public function validateFields(array $fields){
        foreach($fields as $field){
            if(empty($_POST[$field])){
                return false;
            }
        }

        return true;
    }

    /**
     * Validates the user's connection
     *
     * @param string $key The user's id
     * @return bool
     */
    protected function validateConnection(string $key){
        return ! empty($_SESSION[$key]);
    }

    /**
     * Verifies if the information input into the fields respects the limit of characters, if not redirect
     *
     * @param string $field The content from the input field
     * @param int $nb_characters The character limit
     * @param string $route The route for redirection
     * 
     * @return bool
     */
    public function verifyCharacterLimit(string $field, int $nb_characters, string $route, $bool = null){
        if(strlen($field) > $nb_characters && $bool){
                
            Redirection::redirect($route, ["id" => $_POST["id"], "limite-caracteres" => "depasser"]);

        } elseif (strlen($field) > $nb_characters) {
            
            Redirection::redirect($route, ["limite-caracteres" => "depasser"]);
        }
    }
}