<?php
 
class Connect {

    private $host;
    private $username;
    private $password;
    private $db;
    private $newDB;
    private $error;
    private $qError;
    private static $instance;

    private $stmt;

    // Constructeur

    private function __construct($host, $username, $password, $db) {

            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->db = $db;



            $dns = "mysql:host=".$this->host.";dbname=".$this->db;
            $options = array(
                PDO::ATTR_PERSISTENT  => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->newDB = new PDO($dns, $this->username, $this->password, $options);
            }
        
            catch (PDOExecption $e){
                $this->error = $e->getMessage();
            }

    }

    // Fonction pour préparer une requête SQL.
    public function query($query){
        $this->stmt = $this->newDB->prepare($query);
    }

    // Fonction pour bind un parametre automatiquement si le type n'est pas renté.

    public function bind($param, $value, $type =null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
           
        }
        $this->stmt->bindvalue($param, $value, $type);
    }

    // Fonvtion pour executer notre requête SQL précédement préparé.
    
    public function execute(){
        return $this->stmt->execute();

        $this->qError = $this->newDB->errorInfo();
            if(!is_null($this->qError[2])){
                echo $this->qError[2];
            }
            echo 'done with query';
    }

    // Fonction pour fetchAll notre base de donnée.

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour fetch un seul élément de notre base de donnée.

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fonction statique permétant de se connecter à la base de données.

    public static function getInstance(){
        if(static::$instance === null){
            static::$instance = new Connect('localhost', 'Admin', 'Admin', 'donnees_menuizman');
        }
        return static::$instance;
    }
    
    // Fonction permétant de retourner l'id du dernier id enregistré dans la db.

    public function getLastInsertID(){
        return $this->newDB->lastInsertId();
    }

}

?>
