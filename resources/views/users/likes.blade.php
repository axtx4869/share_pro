@extends('layouts.app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
@include('nav')
    <div class="pt-32 note-bg">
        <section class="flex container mx-auto lg:flex-row flex-col">
            @include('users.user')
            @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
        </section>
        <section class=" h-full flex flex-row flex-wrap container mx-auto h-screen">
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
        @empty($articles[0])
            <h1 class="m-auto h-screen">投稿はありません</h1>
        @endempty
        </section>
    </div>
@endsection
