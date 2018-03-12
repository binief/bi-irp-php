<?php


class dbsettingsconfig{
    
    private $connectionUrl="mysql:host=mysql7002.site4now.net;dbname=l5dpqcfl_biirp";
    
    public $username="l5dpqcfl_biirp";
    public $password="biirp1234";
    
    public function getConnectionUrl(){
        return $this->connectionUrl;
    }
}