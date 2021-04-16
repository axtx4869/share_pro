@extends('layouts.app')

@section('title', $user->name)

@section('content')
@include('nav')
<div class="pt-32 note-bg h-full">
    <section class="flex lg:flex-row flex-col container mx-auto {{ empty($articles[0]) ? 'h-full' : '' }}">
    @include('users.user')
    @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
    </section>
    <section class="h-full flex flex-row flex-wrap container mx-auto {{ empty($articles_array) ? 'h-full' : '' }}">
    @foreach($articles as $article)
        @include('articles.card')
    @endforeach
    @empty($articles[0])
            <h1 class="m-auto h-screen">投稿はありません</h1>
    @endempty
    </section>
</div>
@endsection
