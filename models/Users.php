<?php

    require_once("bases/Model.php");

    class Users extends Model {
        // the name of the model's table
        protected $table = "users";   

        /**
         * Inserts a new user into the DB
         *
         * @param string $first_name First name
         * @param string $last_name Last name
         * @param string $email  E-mail 
         * @param string $password  Non-encrypted password
         * 
         * @return bool Returns false if there is an insertion error
         */
        public function addNewUser($first_name, $last_name, $email, $password){
            // SQL
            $sql = "INSERT INTO $this->table (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholders
            return $stmt->execute([
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":email" => $email,
                ":password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
        }

        /**
         * Verifies that the user exists and if the password corresponds to the information in the DB
         *
         * @param string $email E-mail
         * @param string $password  Password received from the form
         * 
         * @return bool Returns false if the user does not exist or if the password is wrong
         */
        public function verify(string $email, string $password){
            // SQL
            $sql = "SELECT *
                    FROM $this->table
                    WHERE email = :email";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholders
            $stmt->execute([
                ":email" => $email
            ]);

            // Recuperates the entry
            $entry = $stmt->fetch();

            // Verifies if the user exists
            if( ! $entry) {
                return false;
            }

            // Verifies the password
            $password_ok = password_verify($password, $entry["password"]);
            
            if( ! $password_ok) {
                return false;
            }

            // Adds the user's id to the session
            $_SESSION["user_id"] = $entry["id"];
            
            return true;
        }

        /**
        * Modify an existing user
        *
        * @param int $id The user's id
        * @param string $first_name The user's first name
        * @param string $last_name The user's last name
        * @param string $email The user's email
        *  
        * @return bool
        */
        function modifyExistingUser(int $id, string $first_name, string $last_name, string $email){

            $sql = "UPDATE $this->table
                    SET
                        first_name = :first_name,
                        last_name = :last_name,
                        email = :email
                    WHERE id = :id";
   
            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholder
            return $stmt->execute([
                ":id" => $id,
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":email" => $email
            ]);
        }
    }