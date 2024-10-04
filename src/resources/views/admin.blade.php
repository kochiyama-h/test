<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header>
        <h2>Fashionably Late</h2>
        <nav>
            <a href="{{ route('logout') }}">logout</a>
        </nav>
    </header>

    <main>
    <h3>Admin</h3>
    <form method="GET" action="{{ route('admin.index') }}">
        <div class="search-area">
            <input type="text" name="name" placeholder="名前で検索" value="{{ request('name') }}">
            <input type="email" name="email" placeholder="メールアドレスで検索" value="{{ request('email') }}">
            <select name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                <option value="全て" {{ request('gender') == '全て' ? 'selected' : '' }}>全て</option>
            </select>
            <input type="text" name="inquiryType" placeholder="お問い合わせの種類で検索" value="{{ request('inquiryType') }}">
            <input type="date" name="date" value="{{ request('date') }}">
            <button type="submit" id="search">検索</button>           
            <button type="submit" name="reset" id="reset">リセット</button>
        </div>
    </form>
    <div>


        <div class="pagination">
            {{ $contacts->links() }}
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
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                    <td>
                        @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category ? $contact->category->content : '未選択' }}</td>
                    <td><a href="{{ route('admin.details', $contact->id) }}">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @isset($selectedContact)
        <div class="modal">
            <div class="modal-content">
                <a href="{{ route('admin.index') }}" class="close-button">×</a>
                <h2>詳細情報</h2>
                <p><strong>お名前:</strong> {{ $selectedContact->first_name }} {{ $selectedContact->last_name }}</p>
                <p><strong>メールアドレス:</strong> {{ $selectedContact->email }}</p>
                <p><strong>性別:</strong> {{ $selectedContact->gender == 1 ? '男性' : ($selectedContact->gender == 2 ? '女性' : 'その他') }}</p>                
                <p><strong>お問い合わせの種類:</strong> {{ $selectedContact->category ? $selectedContact->category->content : '未選択' }}</p>
                <p><strong>詳細:</strong> {{ $selectedContact->detail }}</p>
                     <form method="POST" action="{{ route('admin.delete', $selectedContact->id) }}" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">削除</button>
                     </form>
                
            </div>
        </div>
    @endisset

</main>
    

</body>

</html>