<?php
include_once ("../configs/autoloader.php");
include "../libs/NotORM.php";

class databaseconnectionservice
{
    public function getConnection()
    {
        $dbSettings = new dbsettingsconfig;

        $url = $dbSettings->getConnectionUrl();

        $pdo = new PDO($url, $dbSettings->username, $dbSettings->password);
        
        $db = new NotORM($pdo);

        return $db;
    }
}

?>
