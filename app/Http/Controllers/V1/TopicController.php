<?php

namespace App\Http\Controllers\V1;

use App\Model\TopicImageModel;
use App\Model\TopicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = TopicModel::select(['id', 'content', 'created_at', 'user_id'])->with(['user' => function ($query) {
            $query->select(['id', 'username', 'headimg']);
        }])
            ->with(['comments' => function ($query) {
                $query->select(['id', 'content', 'created_at', 'user_id', 'topic_id'])->with(['user' => function ($query) {
                    $query->select(['id', 'username', 'headimg']);
                }])->limit(5);
            }])->paginate(15);
        $list->each(function ($item) {
            $images = TopicImageModel::where('topic_id', $item->id)->pluck('url')->toArray();
            $item->images = $images;

        });
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = validtor([
            'content' => '',
            'image' => '*'
        ], 'POST');
        $topic = new TopicModel();
        $topic->user_id = \Jwt::getUserId();
        $topic->content = $data['content'];
        $topic->save();
        return jsonResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
