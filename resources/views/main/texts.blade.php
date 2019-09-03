@extends('template.textParent')
@section('href','css/texts.css')
@section('title','Sea&Earth|写真一覧')

@section('header')
    @component('components.header')
    @slot('link1')
        ./
    @endslot
    @slot('nav1')
        Top
    @endslot
    @slot('link2')
        login
    @endslot
    @slot('nav2')
        Login
    @endslot
    @slot('link3')
        setting
    @endslot
    @slot('nav3')
        Setting
    @endslot
    @slot('link4')
        mypage
    @endslot
    @slot('nav4')
        Mypage
    @endslot
    @endcomponent
@endsection

@section('top-title','写真一覧')
@section('texts')
    @foreach ($texts as $text)
        <div class="text">
            <div class="image">
                <a href="text/{{ $text->id }}"><img src="{{ $text->img }}"></a><br/>
            </div>
            ショップ名:<br/><a href="user/{{ $text->user->id }}">{{ $text->user->name }}</a><br/>
            エリア:　{{ $text->user->area }}<br/>
            URL: <a href="{{ $text->user->url }}">ショップはちら</a><br/>
            <div class="text-area">
                {{ $text->text }}
            </div>
        </div>
    @endforeach
@endsection

<a href="https://px.a8.net/svt/ejp?a8mat=35NQEK+98TBXU+AD2+2HCY6P" rel="nofollow">
    <img border="0" width="234" height="60" alt="" src="https://www22.a8.net/svt/bgt?aid=190903916559&wid=001&eno=01&mid=s00000001343015009000&mc=1"></a>
    <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=35NQEK+98TBXU+AD2+2HCY6P" alt="">

@section('footer')
    @component('components.footer')
    @slot('link1')
        ./
    @endslot
    @slot('nav1')
        Top
    @endslot
    @slot('link2')
        login
    @endslot
    @slot('nav2')
        Login
    @endslot
    @slot('link3')
        setting
    @endslot
    @slot('nav3')
        Setting
    @endslot
    @slot('link4')
        mypage
    @endslot
    @slot('nav4')
        Mypage
    @endslot
    @endcomponent
@endsection
