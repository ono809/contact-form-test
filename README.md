# お問い合わせフォーム（contact-form-test）

## 環境構築手順（Docker使用）

```bash
git clone git@github.com:ono809/contact-form-test.git
cd contact-form-test
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app php artisan migrate --seed

## 使用技術(実行環境)
PHP 8.0

Laravel 8.x

MySQL 8

Docker（Laravel開発テンプレート使用）

Composer

## URL
http://localhost/

備考
本課題では、お問い合わせフォームの以下3画面を作成しました

入力画面（index）
確認画面（confirm）
サンクスページ（thanks）

管理画面やモーダル表示機能、ER図などは今回はできていません