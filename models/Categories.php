<?php

    require_once("bases/Model.php");

    class Categories extends Model {
        // the name of the model's table
        protected $table = "categories";

        /**
         * Add a new category
         *
         * @param string $category The name of the new category
         *  
         * @return bool
         */
        public function addNewCategory(string $category){
            // SQL
            $sql = "INSERT INTO $this->table (name) VALUES (:category)";

            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);

            // Executes the request while assigning a value to the placeholders
            return $stmt->execute([
                ":category" => $category,
            ]);
        }

        /**
         * Modify an exisiting category
         *
         * @param int $id The id of the category
         * @param string $category The name of the category
         *  
         * @return bool
         */
        function modifyExistingCategory(int $id, string $category){
    
            $sql = "UPDATE $this->table
                    SET
                        name = :category
                    WHERE id = :id";
    
            // Prepares the request
            $stmt = $this->pdo()->prepare($sql);
    
            // Executes the request while assigning a value to the placeholder
            return $stmt->execute([
                ":id" => $id,
                ":category" => $category
            ]);
        }
    }
    

?>