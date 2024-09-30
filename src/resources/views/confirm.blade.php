<html lang="ja"><!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact-Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

 
</head>

<body>
  <header>
      <h2>Fashonably Late</h2>
    </header>

   <main>
   <div class="confirm__content">
   <h3>Confirm</h3>

   <form class="form"  action="/thanks" method="post">
    @csrf
     
      

     <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">               
                <input type="text" name="first_name" value="{{ $contact['first_name'] }}"readonly/>
                <input type="text" name="last_name" value="{{ $contact['last_name'] }}"readonly/>
              </td>
            </tr>

            <tr class="confirm-table__row">
  <th class="confirm-table__header">性別</th>
  <td class="confirm-table__text">
    <input type="text" name="gender" 
           value="@if($contact['gender'] == 1) 男性 
                  @elseif($contact['gender'] == 2) 女性 
                  @else その他 
                  @endif" readonly/>
  </td>
</tr>






            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $contact['email'] }}"readonly/>
              </td>
            </tr>



            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
              </td>
            </tr>


            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="text" name="address" value="{{ $contact['address'] }}"readonly/>
              </td>
            </tr>


            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">                
                <input type="text" name="building" value="{{ $contact['building'] }}"readonly/>
              </td>
            </tr>


            

            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                  <input type="text" name="category" value="{{ $contact['category'] }}" readonly />
              </td>
            </tr>

            


            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">                
                <input type="text" name="detail" value="{{ $contact['detail'] }}"readonly />
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>  

   </form>
   </div>

   </main> 
  
</body>