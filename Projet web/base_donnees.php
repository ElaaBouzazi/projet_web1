<?php
class base_donnees
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "cv_info";
    public $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection echouée: " . $e->getMessage();
        }
    }
}
?>
