<?php

require_once('config/dbconnect.php');

// Todo
// 1つのクラスに、1つの役割があります。
// tasksテーブルとのやりとりをする
class Todo
{
    // プロパティ
    private $table = 'tasks';
    private $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    public function create($name)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        // INSERT INTO (カラム名, ,) VALUES (値, 値, 値,)
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (name) VALUES (?)');
        $stmt->execute([$name]);
    }

    // DBからデータを全て取得するメソッド
    public function getAll()
    {
        // 実行するSQLを準備
        // $this === このクラスのインスタンス
        // db_manager
        // このクラスのインスタンスのプロパティ
        // DbManagerクラスのインスタンス
        // dbh
        // db_managerのプロパティ
        // PDOクラスのインスタンス
        // prepare
        // dbhのメソッド
        // PDOインスタンスのメソッド
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);

        // $dbh === PDOクラスのインスタンス
        // $dbh->prepare('SELECT * FROM ' . $this->table);

        // 準備したSQLを実行する
        $stmt->execute();

        // 実行結果を取得
        $tasks = $stmt->fetchAll();

        // return === 関数の呼び出し元に、値を返す
        return $tasks;
    }

    public function get($id)
    {
        // $idと一致するidをもつレコードを取得する

        // 準備する
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');

        // 実行する
        $stmt->execute([$id]);

        // 実行結果を変数に代入する
        $task = $stmt->fetch();

        // 結果を関数の呼び出し元に返す
        return $task;
    }

    public function update($id, $name)
    {
        // データの更新
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET name = ? WHERE id = ?');
        $stmt->execute([$name, $id]);
    }
}