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

//$stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES (?, ?, ?)');
//$stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

// Todoクラスをインスタンス化して
$todo = new Todo();
var_dump($todo);
exit; 
// 一覧画面に戻る
header ('Location: index.php');
