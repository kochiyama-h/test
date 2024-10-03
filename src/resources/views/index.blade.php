<html lang="ja"><!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact-Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body>
  <header>
    <h2>Fashonably Late</h2>
  </header>

  <main class="main">
    <h3>Contact</h3>

    <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input  type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name', $contact['first_name'] ?? '') }}"/>
              <input  type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name', $contact['last_name'] ?? '') }}"/>
            </div>
            <div class="form__error">
                @error('first_name')
                    {{$message}}
                @enderror
            </div>
            <div class="form__error">
                @error('last_name')
                    {{$message}}
                @enderror
            </div>
          </div>
        </div>


        <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
    </div>
    <div class="form__group-content">
        <div class="form__input--text">
            <input type="radio" name="gender" id="male" value="1" {{ old('gender', $contact['gender'] ?? '') == '1' ? 'checked' : '' }}/>男性
            <input type="radio" name="gender" id="female" value="2" {{ old('gender', $contact['gender'] ?? '') == '2' ? 'checked' : '' }}/>女性
            <input type="radio" name="gender" id="other" value="3" {{ old('gender', $contact['gender'] ?? '') == '3' ? 'checked' : '' }}/>その他     
        </div>
        <div class="form__error">
            @error('gender')
                {{$message}}
            @enderror
        </div>
    </div>
</div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email', $contact['email'] ?? '') }}"/>
            </div>
            <div class="form__error">
              @error('email')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>


        <div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">電話番号</span>
    <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--text phone-input">
      <input type="tel" name="tel_1" placeholder="090" value="{{ old('tel_1', $contact['tel_1'] ?? '') }}" />
      -
      <input type="tel" name="tel_2" placeholder="1234" value="{{ old('tel_2', $contact['tel_2'] ?? '') }}" />
      -
      <input type="tel" name="tel_3" placeholder="5678" value="{{ old('tel_3', $contact['tel_3'] ?? '') }}" />
    </div>
    <div class="form__error">
      @error('tel_1')
      {{$message}}
      @enderror      
    </div>
    <div class="form__error">
      @error('tel_2')
      {{$message}}
      @enderror      
    </div>
    <div class="form__error">
      @error('tel_3')
      {{$message}}
      @enderror      
    </div>
  </div>
</div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address'] ?? '') }}"/>
            </div>
            <div class="form__error">
              @error('address')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building', $contact['building'] ?? '') }}"/>
            </div>
            <div class="form__error">
              @error('building')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>  


        <div class="form__group">
    <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
    </div>
    <div class="form__group-content">
        <div class="form__input--text">
            <select name="category_id" class="create-form__item-select">
                <option value="" disabled selected>選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $contact['category_id'] ?? '') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__error">
            @error('category_id')
                {{$message}}
            @enderror
        </div>
    </div>
</div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="detail" placeholder="お問い合わせ内容をご記載ください。">{{ old('detail', $contact['detail'] ?? '') }}</textarea>
            </div>
            <div class="form__error">
              @error('detail')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>


        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>

    </form>

  </main>
</body>