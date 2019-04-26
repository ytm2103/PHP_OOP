$(function () {
    //idがjs-delete-btnで始まるIDがクリックされたとき
    $(document).on('click', '[id^="js-delete-btn-"]', function (e) {
        
        //eはクリックされた要素
        //クリックされた要素のデフォルトの機能(別ページへ飛ぶ)を無効にする
        e.preventDefault();

        //idを取得
        //クリックされた要素のidの15文字目以降を取得
        let id = $(this).attr('id').substr('14');

        deleteTask(id);
        
    });


    function deleteTask(id) {
        //リクエスト先、HTTPメソッド、受け取るデータ型など指定
        $.ajax({
            url: 'delete.php?id=' + id,
            type: 'GET',
            dataType: 'json'
        })
        .then(
            //成功した場合の処理
            function (isDeleted) {
                //削除が成功した場合はtrue, 失敗した場合はfalse
                //app.js → delete.php → Todoクラスのdeleteメソッドという順番で実行される
                //Todoクラスのdeleteメソッド → delete.php → app.jsという順番で結果が返ってくる
                //返ってくる結果は(今回は)削除が成功したかどうか
                //成功した場合はtrue, 失敗した場合はfalse
                if (isDeleted) {
                    //画面から削除
                    deleteDOM(id);
                }
                
            },
            //失敗した場合の処理
            function () {
                console.log('error');
            }
        )
    }

    function deleteDOM(id) {
        $('#js-task-' + id).remove();
    }

})