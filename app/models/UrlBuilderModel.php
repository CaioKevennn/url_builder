<?php
namespace app\models;

class UrlBuilderModel{
    
    private static $connection = null;
    private $id_url;
    private $link_url;

    public function __construct($link_url,$id_url=null){
        $this->id_url=$id_url;
        $this->link_url=$link_url;
    }

    public static function getConnection() {
        if (self::$connection == null) {
            $conn = new ConnectionModel();
            self::$connection = $conn->connect(); 
        }
        return self::$connection;
    }
    public function saveUrl(){
        $sql="INSERT INTO urls (link_url) values (:url_link)";
        $stmt=self::getConnection()->prepare($sql);
        $stmt->bindParam('url:link',$this->link_url,\PDO::PARAM_STR);
        $stmt->execute();
        return "deu bom";
    }
}