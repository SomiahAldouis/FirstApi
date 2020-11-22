<?PHP 
include('../db_config.php');

class News{
    public $id;
    public $news_title;
    public $news_details;
    public $news_date;

    public $database;

    function __construct(){
        $this -> database = new DB_config();
    }

    function getSingelRow($id){
        $pdo = $this->database->connect();
        $statment = $pdo->prepare("select * from news where id=?");
        $statment->execute([$id]);
        return $statment->fetchAll(PDO::FETCH_OBJ);
    }

    function getRows(){
        $pdo = $this->database->connect();
        $statment = $pdo->prepare("select * from news");
        $statment->execute();
        $rows = $statment->fetchAll(PDO::FETCH_OBJ);
        $data = array();
        foreach($rows as $row){
            $content['id'] = $row->id;
            $content['title'] = $row->news_title;

            array_push($data , $content);
        }

        return $data;
    }

    function addRow(){
        try{
            $pdo = $this->database->connect();
            $statment = $pdo->prepare("insert into news values (null,?,?,now())");
            $statment->execute([$this->news_title,$this->news_details]);
            return true;
        }catch(PDOException $ex){
            return false;
        }

    }

    function updateRow($id){
        
    }

    function deleteRow($id){
        
    }

}

?>