<?php

    require_once("bases/Model.php");

    class Dishes extends Model {
        // The name of the table
        protected $table = "dishes";

        /**
         * Returns all the dishes
         *
         * @return array|false Associative array containing all the dishes or false in the case of an error
         */    
        public function allDishes() : array {
            // SQL
            $sql = "SELECT *
                    FROM $this->table
                    ORDER BY $this->table.title ASC";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholder
            $stmt->execute();

            return $stmt->fetchAll();   
        }

        /**
         * Add a new dish
         *
         * @param string $title The title of the dish
         * @param string $description The description of the dish
         * @param float $price The dish's price
         * @param int $category_id The id of the dish's category
         *  
         * @return bool
         */
        public function addNewDish(string $title, string $description, float $price, int $category_id){
            // SQL
            $sql = "INSERT INTO $this->table (title, description, price, category_id) VALUES (:title, :description, :price, :category_id)";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholders
            return $stmt->execute([
                ":title" => $title,
                ":description" => $description,
                ":price" => $price,
                ":category_id" => $category_id,    
            ]);
        }

        /**
         * Modify an exisiting dish
         *
         * @param int $id The id of the dish
         * @param string $title The title of the dish
         * @param string $description The description of the dish
         * @param float $price The dish's price
         * @param int $category_id The id of the dish's category
         *  
         * @return bool
         */
        function modifyExistingDish(int $id, string $title, string $description, float $price, int $category_id){

            $sql = "UPDATE $this->table
                    SET
                        title = :title,
                        description = :description,
                        price = :price,
                        category_id = :category_id
                    WHERE id = :id";
   
            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholder
            return $stmt->execute([
                ":id" => $id,
                ":title" => $title,
                ":description" => $description,
                ":price" => $price,
                ":category_id" => $category_id
            ]);
        }
    }

?>