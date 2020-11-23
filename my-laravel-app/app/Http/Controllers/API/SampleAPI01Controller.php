<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class SampleAPI01Controller extends Controller
{
    private $comment;

    //// 【 コントロールにおける、コンストラクタの引数 】
    // 特に特別は工夫は不要みたい。Laravel の DIがいい感じにやってくれるっぽい。
    public function __construct(Comment $comment)
    {
        $this->comment = $comment->find(1);
        // $data = $comment->find(1);
// dd($a1);
// dump($data->toArray());

    }

    public function index() {
        $data = $this->comment->toArray();

dump($data['id']);

        return response($data['body'], Response::HTTP_OK);
    }

}
