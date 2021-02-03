<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $block = new Block;
        // получаем массив топиков(тем)
        $topic = Topic::pluck('topicname', 'id');
        return view('block.create', ['block'=>$block, 'topics'=>$topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = new Block;
        // Обрабатываем данные из формы
        $fname =$request->file('imagepath');
        if ($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $block->imagepath = '/images/' .$original_name;
        } else {
            $block->imagepath = '';
        }

        $block->title = $request->title;
        $block->content = $request->block_content;
        $block->topicid = $request->topicid;

        if (!$block->save()) {
            $err = $block->getErrors();
            return redirect()->action('BlockController@create')->with('errors', $err)->withInput();
        }

        return redirect()->action('BlockController@create')->with('message', "New block $block->title has been added");
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
        $block = Block::find($id);
        $topics = Topic::pluck('topicname', 'id');
        return view('block.edit', ['block'=>$block, 'topics'=>$topics]);
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
        $block = Block::find($id);
        $block->topicid = $request->topicid;
        $block->title = $request->title;
        $block->content = $request->block_content;
        $fname = $request->file('imagepath');
        if ($fname) {
            $original_name = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images', $original_name);
            $block->imagepath = 'images/'.$original_name;
        }

        if (!$block->save()) {
            $err = $block->getErrors();
            return redirect("block/$id/edit")->with('errors', $err)->withInput();
        }

        return redirect("topic/$block->topicid");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();
        return redirect('topic');
    }
}
