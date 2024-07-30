# 202405_rese
RESE
## 作成した目的　　
自社で予約ができるサービスの開発　　

## アプリケーションURL　　

* 開発環境:http://localhost/  
* phpMyAdmin:http://localhost:8080/


## 機能一覧　　
会員登録
ログイン
ログアウト
ユーザー情報取得
ユーザー飲食店お気に入り一覧取得
ユーザー飲食店予約情報取得
飲食店一覧取得
飲食店詳細取得
飲食店お気に入り追加
飲食店お気に入り削除
飲食店予約情報追加
飲食店予約情報削除
エリアで検索する
ジャンルで検索する
店名で検索する


## 使用技術  

* PHP 8.0  
* Laravel 10.0  
* MySQL 8.0

## テーブル設計  
<img width="341" alt="スクリーンショット 2024-07-30 14 57 40" src="https://github.com/user-attachments/assets/4312733f-6840-4dac-b0a0-3d3bad931e33">

## ER図  
![rese drawio](https://github.com/user-attachments/assets/50c8f79f-c7b4-4603-b3db-9ed995e76941)


## 環境構築　　
dockerビルド　 
  
1.  https://github.com/yasuyo-okamoto/202405_rese.git
2. docker-compose pu -d --build  
*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください  

Laravel環境構築  

1. docker-compose exec php bash  
2. composer install  
3. .env.exampleファイルから.envを作成し、環境変数を変更  
4. php artisan key:generate  
5. php artisan migrate  
6. php artisan db:seed  



