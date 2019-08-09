<?php

require_once('Models/Todo.php');

// echo '<pre>';
// var_dump($_GET);
// die;

// データの受け取り
$id = $_GET['id'];

// Todoクラスをインスタンス化
$todo = new Todo();

// データの削除
// Todoクラスのdeleteメソッドを実行
$todo->delete($id);

// 一覧画面に戻る
header('Location: index.php');