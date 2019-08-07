<?php

//DBからデータを取得する
//インスタンスを$todoという変数に代入
//インスタンス化 === newクラス名   
require_once('function.php');
require_once('Models/Todo.php');
//Todoクラスのインスタンス化
    $todo = new Todo();
    // echo'<pre>';
    // var_dump($todo);
    // exit;
    //DBからデータを取得して、$tasksという変数に代入
    // DBからデータを全件取得 === TodoクラスのインスタンスのgerAllメソッドを実行
    
    $tasks = $todo->getAll();

    // echo'<pre>';
    // var_dump($tasks);
    // exit;
?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">

        <section>
            <form class="form-row" action="create.php" method="POST">
                <div class="col-12 col-md-9 py-2">
                    <input type="text" name="task" class="form-control" placeholder="ADD TODO">
                </div>
                <div class="py-2 col-md-3 col-12">
                    <button type="submit" class="col-12 btn btn-primary btn-block">ADD</button>
                </div>
            </form>
        </section>

        <section class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-primary text-light">
                        <th class=>TODO</th>
                        <th>DUE DATE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <!-- 取得したデータを表示する -->
                <?php foreach ($tasks as $task): ?>
                    <tr id="js-task-<?php echo h($task['id']); ?>">
                        <td><?php echo h($task['name']); ?></td>
                        <td><?php echo h($task['due_date']); ?></td>
                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">EDIT</a>
                        </td>
                        <td>
                            <a class="text-danger" id="js-delete-btn-<?php echo h($task['id']) ?>" href="">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                   
                    <tr>
                        <td>create new website</td>
                        <td>2019/08/21</td>
                        <td>
                            <a class="text-success" href="edit.php">EDIT</a>
                        </td>
                        <td>
                            <a class="text-danger" href="delete.php">DELETE</a>
                        </td>
                    </tr>
                    <tr>
                        <td>go to club</td>
                        <td>2019/10/21</td>
                        <td>
                            <a class="text-success" href="edit.php">EDIT</a>
                        </td>
                        <td>
                            <a class="text-danger" href="delete.php">DELETE</a>
                        </td>
                    </tr>
                </tbody>
            </table>  
        </section>
    </main>
    
    <script src="assets/js/app.js"></script>
</body>
</html>