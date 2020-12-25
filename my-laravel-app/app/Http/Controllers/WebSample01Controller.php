<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class WebSample01Controller extends Controller
{
    private $model_post    = Post::class;
    private $model_comment = Comment::class;


    public function __construct()
    {
    }

    /**
     *
     *
     */
    public function index(Request $request) {
        // $data = $this->comment->toArray();
        $this->sampleMethod($request);

        return 999;
    }


    /**
     *
     *
     */
    public function sampleMethod($params) {
        $params['title'] = "title01";


        $query = Post::query();
        $query->where('title', $params['title']);
        $query->with(['comment' => function ($q) {
            $q->select('post_id','body');
        }]);
        $query->select('id', 'title', 'body');



        $records = $query->get();

echo "<pre>";
// var_dump($records->toArray());
print_r($records->toArray());
echo "</pre>";

dump($records->toArray());

        return;
    }

}
