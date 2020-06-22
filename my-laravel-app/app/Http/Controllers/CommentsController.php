<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsController extends Controller
{
    /**
     * INSERT or UPDATE
     * 
     * @return 
     */
    public function store(Request $request, Post $post) {
        $this->validate($request, [
          'body' => 'required'
        ]);
        $comment = new Comment(['body' => $request->body]);
        $post->comments()->save($comment);
        return redirect()->action('PostsController@show', $post);
    }

    /**
     * DELETE
     */
    public function destroy(Post $post, Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }

    /**
     * ＜sample＞
     * transaction 01
     */
    public function transaction_sample_01() {

        DB::transaction(function () {
            DB::table('comments')->where('id', 9)->update(['body' => 'changed']);
            DB::table('comments')->where('id', 8)->update(['post_id' => null]);
        });


        DB::transaction(function () {
            DB::table('comments')->where('id', 9)->update(['body' => 'changed']);
            DB::table('comments')->where('id', 8)->update(['post_id' => null]);
        }, 5);  // トランザクションの再試行回数を指定可。試行回数を過ぎたら、例外が投げられる。


        // return redirect('/');
    }

    /**
     * ＜sample＞
     * transaction 02
     */
    public function transaction_sample_02() {

        try{
            DB::beginTransaction();

            DB::table('comments')->where('id', 9)->update(['body' => 'changed']);
            DB::table('comments')->where('id', 8)->update(['post_id' => null]);

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();

        }


      // return redirect('/');
    }
}