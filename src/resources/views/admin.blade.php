<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <h1>Fashionably Late</h1>
        <nav>
            <a href="{{ route('logout') }}">logout</a>
        </nav>
    </header>

    <main>
        <h2>Admin</h2>

        <div class="search-area">
            <input type="text" id="name" placeholder="名前で検索">
            <input type="email" id="email" placeholder="メールアドレスで検索">
            <select id="gender">
                <option value="">性別</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
                <option value="全て">全て</option>
            </select>
            <input type="text" id="inquiryType" placeholder="お問い合わせの種類で検索">
            <input type="date" id="date">
            <button id="search">検索</button>
            <button id="reset">リセット</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th>詳細</th>
                </tr>
            </thead>
            <tbody id="data-table">
                <!-- データがここに入る -->
            </tbody>
        </table>

        <div class="pagination">
            <!-- ページネーション -->
            {{ $data->links() }}
        </div>
    </main>

    <!-- モーダルウィンドウ -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>詳細</h2>
            <div id="modal-body"></div>
            <button id="delete">削除</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // モーダルの表示
            $(document).on('click', '.detail-button', function() {
                const dataId = $(this).data('id');
                // 詳細情報を取得する処理（Ajaxなどで）
                $('#modal-body').html('詳細情報をここに表示します。');
                $('#modal').show();
            });

            // モーダルを閉じる
            $('.close').click(function() {
                $('#modal').hide();
            });

            // リセットボタン
            $('#reset').click(function() {
                $('#name').val('');
                $('#email').val('');
                $('#gender').val('');
                $('#inquiryType').val('');
                $('#date').val('');
            });

            // 削除ボタン
            $('#delete').click(function() {
                // 削除処理をここに実装
                $('#modal').hide();
            });
        });
    </script>
</body>

</html>