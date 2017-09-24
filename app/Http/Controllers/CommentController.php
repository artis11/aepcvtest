<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $comment = new Comment;
        $comment->validate($request->all());
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $post->comments()->save($comment);

        return redirect()->action('PostController@show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $postId
     * @param  int  $commentId
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        DB::table('blocked_emails')->insert(
            ['email' => $comment->email]
        );
        Comment::where('email', $comment->email)->delete();
        return redirect()->action('PostController@show', $postId);
    }
}
