<?php

require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$task = $_POST['task'];

//Todoクラスをインスタンス化
$todo = New Todo;

//Todoクラスのcreateメソッドを実行
$todo->create($task);

//index.phpに戻る
header('Location: index.php');