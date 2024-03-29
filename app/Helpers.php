<?php

namespace App;

use App\Text;

class Helpers{

    public function decision($text = 0,$area = 0,$season = 0)
    {
        if(!empty($text)){
            if(!empty($area)){
                if(!empty($season)){
                    // 全部選択されている場合
                    $data =Text::where('title','like','%'.$text.'%')->where('season',$season)->where('area',$area)->get();
                    return $data;
                }else{
                    //テキストとエリアの選択されている
                    $data = Text::where('title','like','%'.$text.'%')->where('area',$area)->get();
                    return $data;
                }
            }else{
                if(!empty($season)){
                    //テキストと季節のみ選択されている
                    $data = Text::where('title','like','%'.$text.'%')->where('season','$season')->get();
                    return $data;
                }else{
                    //テキストのみ選択された
                    $data = Text::where('title','like','%'.$text.'%')->get();
                    return $data;
                }
            }
        }else{
            if(!empty($area)){
                if(!empty($season)){
                    //季節とエリアのみ選択があったOK
                    $data = Text::where('season',$season)->where('area',$area)->get();
                    return $data;
                }else{
                    //エリアのみ選択があったOK
                    $data = Text::where('area',$area)->get();
                    return $data;
                }
            }else{
                //季節のみ選択があったOK
                $data = Text::where('season',$season)->get();
                return $data;
            }
        }
    }
}
