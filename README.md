# アプリケーション名　
お問い合わせフォーム

## 環境構築
Dockerビルド
  1 git clone git@github.com:kochiyama-h/test.git 
  2 docker-compose up -d --build

Laravel 環境構築
　1 docker-compose exec php bash
　2 composer install
  3 env.exampleファイルからevnを作成し、環境変数を変更
4 php artisan key:generate
5 php artisan migrate
6 php artisan db:seed
  
## 使用技術(実行環境)
- PHP 7.4
-Laravel 8.75
-MySQL 8.0.26

## ER図
<img width="483" alt="image" src="https://github.com/user-attachments/assets/62fd365d-ad27-4af2-9b49-fea1efcd7117">



## URL
-開発環境：http://localhost/
-phpMyAdmin：http://localhost:8080
-お問い合わせフォーム入力ページ：http://localhost/　
-お問い合わせフォーム確認ページ：http://localhost/confirm 
-サンクスページ：http://localhost/thanks 
-ユーザ登録ページ：http://localhost/register　
-ログインページ：http://localhost/login　
-管理画面：http://localhost/admin　

