<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact-Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">  
</head>

<body>
<header>
  <h2>Fashonably Late</h2>
  <nav>
    <a href="{{ route('login') }}">login</a>
  </nav>
</header>

  <main>
    <h3>register</h3>

    <div>

      <form  class="form" action="/register" method="post">
        @csrf
  
        <div class="form__group">
            <div class="form__group-title">
              <label for="name" class="form__label--item">お名前</label>            
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="name" placeholder="例：山田　太郎"value="{{ old('name') }}"/>
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                @error('name')
                {{$message}}
                @enderror
              </div>
            </div>
          </div>
  
        <div class="form__group">
            <div class="form__group-title">
              <label for="email" class="form__label--item">メールアドレス</label>            
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="email" name="email" placeholder="例：test@example.com"value="{{ old('email') }}"/>
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                @error('email')
                {{$message}}
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
              <input type="password" name="password" placeholder="例：coachtech1106" value="{{ old('password') }}"/>
                
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                @error('password')
                {{$message}}
                @enderror
              </div>
            </div>
          </div>
  
          <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
          </div>
  
  
      </form>
    </div>

  </main>
</body>