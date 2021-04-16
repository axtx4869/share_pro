@extends('layouts.app')

@section('title', $tag->hashtag)

@section('content')
  @include('nav')
  <div class="note-bg pt-32 h-full">
    <div class="container m-auto">
      <div class="flex justify-center">          
          <p class="inline-block text-md font-medium text-gray-600 border border-gray-500 border-solid rounded-lg p-1">
          {{ $tag->hashtag }}
          </p>
          <span class="grid place-items-center">&nbsp;の投稿 : 全{{ $tag->articles->count() }}件</span>
      </div>
      <section class="h-full flex flex-row flex-wrap">
      @foreach($tag->articles as $article)
          @include('articles.card')
      @endforeach
      </section>
    </div>
  </div>
@endsection