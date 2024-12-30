<?php



class Database{
    public $conn_obj;
    public $sql = "SELECT * FROM articles";

    public function __construct($host, $user, $password, $db_name){
        $this->conn_obj = new \mysqli($host, $user, $password, $db_name);
        
        if($this->conn_obj->connect_errno){
            die('Ошибка подключения: ' . $this->conn_obj->connect_error);
        } 
    }

    public function insert($title, $content){
        $sql = "INSERT INTO articles (title, content) VALUES('$title', '$content')";
        $this->conn_obj->query($sql);
    }

    public function get(){
        $sql = "SELECT * FROM articles";
        $raw = $this->conn_obj->query($sql);
        $result = [];

        while ($row = $raw->fetch_assoc()) {

            $result[] = $row;
        }

        return $result;
    }

    public function delete($id){
        $sql = "DELETE FROM articles WHERE id = " . $id;
        $this->conn_obj->query($sql);
    }

    public function update($id, $title, $content){
        $sql = "UPDATE articles SET title = '$title', content = '$content' WHERE id = " . $id;
        $this->conn_obj->query($sql);
    }

    public function addFavourite($id, $isFavor = true){
        $sql = "UPDATE articles SET favourite = '$isFavor' WHERE id = '$id'";
        $this->conn_obj->query($sql);
    }

    public function getFavourite(){
        $sql = "SELECT * FROM articles WHERE favourite = 1";
        $raw = $this->conn_obj->query($sql);
        $result = [];

    while ($row = $raw->fetch_assoc()) {
        $result[] = $row;
    }

    return $result;
}

}

?>

