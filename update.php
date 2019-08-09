<?php
require_once('Models/Todo.php');
// データ更新
// 更新するデータを特定する
// データの受け取り
// id, task
$id = $_POST['id'];
$task_name = $_POST['task'];
// 更新
// Todoクラスのインスタンスを$todoに代入
$todo = new Todo();
// Todoクラスのupdateメソッドを実行
$todo->update($id, $task_name);
// echo '<pre>';
// var_dump($_POST);
// die;
// 一覧画面に戻る
header('Location:index.php');