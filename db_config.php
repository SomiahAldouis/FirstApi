<?PHP

class DB_config{
    private $host = "localhost";
    private $db_name = "AndroidNewsApi";
    private $db_user = "root";
    private $db_password = "";

    private $pdo;

    function __construct(){
        $this -> pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->db_user,$this->db_password);
        $this -> pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    }

    function connect(){
        return $this->pdo;
    }

}

?>