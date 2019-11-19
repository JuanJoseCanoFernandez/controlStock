<?php
class ConnDB{
    private static $instance = null;
    private $_connected;

    private $_host = 'localhost',
            $_user = 'adminTienda',
            $_pass = 'adminTienda',
            $_name = 'bdtienda';

    private function __construct(){
        $this->_connected = new PDO("mysql:host={$this->_host};
        dbname={$this->_name}",$this->_user,$this->_pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new ConnDB();
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->_connected;
    }
}
?>
