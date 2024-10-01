<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header>
        <h2>Fashonably Late</h2>
        <nav>
          <a href="{{ route('register') }}">register</a>
         </nav>
    </header>

    <main>
        <h3>Login</h3>

        <form action="/login" method="POST">
            @csrf
            <div class="form__group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__group">
                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="例：password">
                @error('password')
                    <div class="form__error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form__button">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </main>
</body>
</html>