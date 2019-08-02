<?php

require_once('config/dbconnect.php');

// Todo→tasksテーブルとのやり取りを取得する
class Todo
{
    // プロパティ
    private $table = 'tasks';
    private $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // Dbmanager
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }
    public function create($name)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
            //Dbmanagerのクラスのインスタンス　　
        // dbhプロパティの
        // PDOのインスタンス
        //prepareメソッドを実行

        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (name) VALUES (?)');
        $stmt->execute([$name]);
    }

    //DBからデータを全て取得するメソッド
    public function getAll()
    {
        // 実行するSQLを準備
        // $this === このクラスのインスタンス
        // db_manager
            // このクラスのインスタンスのプロパティ
            // db_managerクラスのインスタンス
        // dbh
            // db_managerのプロパティ
            // POOクラスのインスタンス
        // dbhのメソッド
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' ORDER BY id desc');
        // 準備したSQlを実行する
        $stmt->execute();
        // 実行結果を取得
        $tasks = $stmt->fetchAll(); 
        // return === 関数の呼び出し元に値を返す
        return $tasks;
    }
}