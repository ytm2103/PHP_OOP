<?php

require_once('config/dbconnect.php');

// Todo
class Todo
{
    // プロパティ
    private $table = 'tasks';
    private $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }
    // 
    
}