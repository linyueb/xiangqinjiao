<?php

namespace App\Http\Controllers\V1;

use App\Model\CommentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = validtor([
            'topic_id'=>''
        ]);
        $list = CommentModel::where('topic_id',$data['topic_id'])->select(['id','user_id','content'])->with(['user' => function ($query) {
            $query->select(['id', 'username', 'headimg']);
        }])->paginate(15);
        return jsonResponse($list);
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
    public function store(Request $request)
    {
        $data = validtor([
            'content'=>'',
            'topic_id'=>''
        ],'POST');
        $user_id = \Jwt::getUserId();
        $comment = new CommentModel();
        $comment->user_id = $user_id;
        $comment->content = $data['content'];
        $comment->topic_id = $data['topic_id'];
        $comment->save();
        return jsonResponse();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
