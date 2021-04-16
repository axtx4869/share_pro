@extends('layouts.app')
@section('title',$browser_title)
@section('content')
    @include('nav')
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
    <div id="flash-message" class="pt-24 w-full text-center my-0 bg-green-500">
        {{ session('flash_message') }}
    </div>
    @endif
    <section class="note-bg h-full w-full pt-24 pb-12">
    <div class="container mx-auto flex justify-center p-4">
        <h2 class="text-center text-lg font-bold" 
        style="text-decoration: underline 3px wavy rgba(16, 185, 129);">
        みんなにおすすめのプログラミング学習教材をシェアしよう！
        </h2>
    </div>
    <div class="container mx-auto flex flex-row flex-wrap">
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
        {{ $articles->links() }}
    </div>
    </section>
@endsection

