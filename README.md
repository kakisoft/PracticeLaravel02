# PracticeLaravel02
Laravel で色々遊ぶ用のリポジトリ


## 起動・終了
```
docker-compose up -d
docker-compose down
```

## コンテナに入る
```
docker-compose exec app bash
```


## 終了時にコンテナを削除
```
docker-compose down --rmi all
docker-compose down --rmi all --volumes
```

_______________________________________________________________________________
_______________________________________________________________________________
_______________________________________________________________________________
# 初回起動時

## composer install
```
composer install
```

## .env を用意
.env.example をコピー。  
必要があれば編集。


## migrate
```
php artisan migrate
```


## キーを用意
コピーしない場合は、コマンドで作成。
```
php artisan key:generate
```


_______________________________________________________________________________
_______________________________________________________________________________
_______________________________________________________________________________
# プロジェクト作ったり、モデルを追加したり

## Create Project
```
composer create-project --prefer-dist  "laravel/laravel=5.5" my-laravel-app
```

## Rollback
```
php artisan migrate:rollback
```


## Model追加
```
php artisan make:model Models/Post -m
php artisan make:model Models/Comment -m
（編集）
php artisan migrate
```


## RequestModel追加
```
php artisan make:request PostRequest
```


## Controller 追加
```
php artisan make:controller PostsController
php artisan make:controller CommentsController
```


