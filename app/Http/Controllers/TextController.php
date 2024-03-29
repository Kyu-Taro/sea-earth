<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Storage;
use App\Text;
use App\Helpers;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Helpers $helpers)
    {
        if ($request->query('word') || $request->query('area') || $request->query('season')) {
            $text = $request->query('word');
            $area = $request->query('area');
            $season = $request->query('season');
            $texts = $helpers->decision($text,$area,$season);

            return view('main.texts',compact('texts'));
        }else{
            $texts = Text::get();

            return view('main.texts',compact('texts'));
        }
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
    public function store(Request $request,CreateRequest $validate)
    {
        $form = $request->all();
        unset($form['_token']);

        $path = Storage::disk('s3')->putFile('seaearth',$request->file('img'),'public');
        $form['img'] = Storage::disk('s3')->url($path);

        $text = new Text();

        $text->fill($form)->save();
        session()->flash('fls_msg','投稿完了しました');
        return redirect()->route('mypage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $text = Text::find($id);

        return view('main.textDetail',compact('text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Text::find($id)->delete();
        session()->flash('fls_msg','投稿の削除完了しました');
        return redirect()->route('mypage');
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
