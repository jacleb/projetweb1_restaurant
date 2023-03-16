<?php

    require_once("bases/Model.php");

    class NewsletterSubscriptions extends Model {
        // the name of the model's table
        protected $table = "subscribers";

        /**
         * Add a new subscriber
         *
         * @param string $email The visitor's email address
         *  
         * @return bool
         */
        public function subscribeToNewsletter(string $email){
            // SQL
            $sql = "INSERT INTO $this->table (email) VALUES (:email)";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholders
            return $stmt->execute([
                ":email" => $email, 
            ]);
        }
    }

?>