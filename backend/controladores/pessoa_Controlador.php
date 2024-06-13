<?php

class Pessoa_Controlador
{
    private static $instance;
    private $pessoas;
    private $quantidade;

    public function __construct()
    {
        $this->pessoas = array();
        $this->quantidade = 0;
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_pessoas()
    {
        return $this->pessoas;
    }
}