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

    <form class="form" action="/login" method="POST">
    @csrf

    <div class="form__group">
        <div class="form__group-title">
            <label for="email" class="form__label--item">メールアドレス</label>            
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <label for="password" class="form__label--item">パスワード</label>            
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="password" name="password" placeholder="例：password" value="{{ old('password') }}" />
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form__button">
        <button class="form__button-submit" type="submit">ログイン</button>
    </div>
</form>
    </main>
</body>
</html>