<?php

abstract class Model {
    /**
     * All the instances contain the same connection
     *
     * @var PDO|null
     */
    private static $pdo = null;

    // The value of "null" permits to generate an error if it is not specified in the child-model 
    protected $table = null;

    /**
     * Constructor 
     */
    public function __construct(){
    
    }

    /**
     * Returns the PDO connection and connects as needed 
     *
     * @return PDO
     */
    protected function pdo(){
        // Verifies if a connection is necessary
        if(static::$pdo == null){
            // Includes the required connection information
            require "config/database.php";

            // Connection
            static::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // Connection options
            static::$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            static::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

         // Error message to the developper that indicates if the name of the table was not defined in the child-model
        if($this->table == null){
            trigger_error("Le nom de la table n'a pas été défini dans le modèle " . get_called_class(), E_USER_ERROR);
        }

        return static::$pdo;
    }

    /**
     * Returns all the results from the table associated to the model
     *
     * @return array|false Associative array or false if there's an error
     */
    public function all(){
        // SQL
        $sql = "SELECT *
                FROM $this->table";

        // Prepares the request
        $stmt = $this->pdo()->prepare($sql);

        // Executes the request
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Returns all the results from the table associated to the model in ASC order by id
     *
     * @return array|false Associative array or false if there's an error
     */
    public function allOrderById(){
        // SQL
        $sql = "SELECT *
                FROM $this->table
                ORDER BY $this->table.id ASC";

        // Prepares the request
        $stmt = $this->pdo()->prepare($sql);

        // Executes the request
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Returns an element of the model according to the id
     *
     * @param integer $id
     * @return array|false Associative array or false if there's an error
     */
    public function byId(int $id) : array {

        // SQL
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id";
        
        // Prepares the request
        $stmt = $this->pdo()->prepare($sql);

        // Executes the request while assigning a value to the placeholders
        $stmt->execute([
            ":id" => $id
        ]);

        return $stmt->fetch();
    }

    /**
     * Delete an entry from the DB
     * 
     * @param int $id The entry's id
     * 
     * @return bool
     */
    public function delete(int $id){
        // SQL
        $sql = "DELETE FROM $this->table
                WHERE id = :id";

        // Prepares the request
        $stmt = $this->pdo()->prepare($sql);

        // Executes the request while assigning a value to the placeholder
        return $stmt->execute([
            ":id" => $id
        ]);
    }
}