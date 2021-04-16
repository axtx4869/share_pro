@extends('layouts.app')

@section('title', '')

@section('content')
@include('nav',['article' => $article])
<section class="note-bg h-full text-gray-700 body-font">
    <div class="container px-5 py-32 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap flex-col">
            @empty($article->image)
                <div class="flex flex-col w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            @else
            <!-- アイキャッチ画像が存在する場合 -->
                    <div class="w-full h-64">
                        <img alt="アイキャッチ画像" class="h-full w-11/12 object-cover object-center m-auto rounded border border-gray-200" src="{{ asset('storage/images/'.$article->image) }}">
                    </div>
                <div class="flex flex-col w-full pt-10"> 
            @endempty
                </div>
                <div>
                <!-- タイトル -->
                @unless(empty($article->url))
                    <a href="{{ $article->url }}" class="hover:underline" target="_blank">
                @endunless
                        <h1 class="text-gray-900 text-center text-3xl title-font font-bold mb-1">{{ $article->title }}</h1>
                @unless(empty($article->url))
                    </a>
                @endunless
                <!-- タイトルここまで -->
                </div>
                <div>
                    <time class="text-gray-900 flex flex-row-reverse" itemprop=”datepublished” datetime="{{ $article->created_at->format('Y-m-d') }}">
                    {{ $article->created_at->format('Y年m月d日') }}
                    </time>
                </div>
                <!-- 本文 -->
                <div class="py-4 border-b border-black border-solid">
                    <p class="text-xl leading-relaxed text-gray-900">{!! nl2br(e($article->body)) !!}</p>
                </div>
                <!-- 本文ここまで -->
                <hr class="text-black">
                <div class="flex justify-between py-2">
                    <div class="">
                        <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="flex text-gray-900">
                            <i class="grid place-items-center text-3xl mr-4 fas fa-user-circle"></i>
                            <span class="grid place-items-center font-bold">
                                {{$article->user->name}}
                            </span>
                        </a>
                    </div>
                    @unless(empty($article->url))
                    <a href="{{ $article->url }}" class="text-gray-900 hover:underline grid place-items-center" target="_blank">
                        教材に移動する
                    </a>
                    @endunless
                    <article-like 
                        :initial-is-liked='@json($article->isLiked(Auth::user()))'
                        :initial-count-likes='@json($article->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('articles.like', ['article' => $article]) }}">
                    </article-like>
                </div>
        </div>
    </div>
</section>
<!-- モーダル -->
<div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
    <div id="delete-confirm-modal" class="grid place-items-center pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
        <!-- 閉じるボタン -->
        <button 
        onclick="openModal(false)"
        class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
        &cross;
        </button>
        <!-- 閉じるボタンここまで -->
        <div class="grid place-items-center w-full p-3">
            <p>本当に削除しますか？</p>
            <div class="flex justify-around my-3 w-1/2 ">
                <button onclick="openModal(false)"
                class="bg-gray-200 hover:bg-gray-400 hover:text-white px-4 py-2 rounded focus:outline-none">キャンセル</button>
                <div class="bg-red-500 hover:bg-red-600 px-8 py-2 rounded text-white focus:outline-none">
                    <form id="delete-article-button" action="{{ route("articles.destroy", ['article' => $article]) }}" method="POST"
                        class="w-full h-full grid place-items-center">
                        @csrf
                        @method('DELETE')
                        <button form="delete-article-button" class="">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- モーダルここまで -->
@endsection