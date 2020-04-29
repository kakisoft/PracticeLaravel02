# PracticeLaravel02
Laravel で色々遊ぶ用のリポジトリ

```
docker-compose up -d
docker-compose down
```


```
docker-compose exec app bash
```


## 終了時にコンテナを削除
```
docker-compose down --rmi all
docker-compose down --rmi all --volumes
```

_______________________________________________________________________________
## Create Project
```
composer create-project --prefer-dist  "laravel/laravel=5.5" my-laravel-app
```


php artisan migrate:rollback




_______________________________________________________________________________
## tmp
```
php artisan make:model Models/Post -m
（編集）
php artisan migrate
php artisan make:model Models/Comment -m
（編集）
php artisan migrate


---------------------------------------------
php artisan make:request PostRequest
（編集）
php artisan migrate

```

```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
```


```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('post_id');
            $table->unsignedInteger('post_id');
            $table->string('body');
            $table->timestamps();
            $table
              ->foreign('post_id')
              ->references('id')
              ->on('posts')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
```
