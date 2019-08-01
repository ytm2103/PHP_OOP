<?php
// Todo.phpを読みこむ
require_once('Models/Todo.php');

// ADDボタンを押したら、

// ユーザーが入力した内容を取得
$task = $_POST['task'];
// echo '<pre>';
// var_dump($task);

// exit;

// DBに保存



// Todoクラスをインスタンス化して
$todo = new Todo();

// Todoクラスのインスタンスの
// create メッソドを実行
$todo->create($task);
// var_dump($todo);
// exit; 
// 一覧画面に戻る
header ('Location: index.php');
