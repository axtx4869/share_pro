@extends('layouts.app')

@section('title', '| 記事投稿')

@section('content')
<section class="bg-indigo-500">
    <div class="container m-auto">
        <div class="w-5/6 m-auto p-6">
            <a href="{{ route('articles.index') }}">
            « 戻る
            </a>
        </div>
        <form id="store-button" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data"
                class="form p-6">
            @include('articles.form')
            <div class="flex justify-center py-8 m-auto lg:w-1/3 md:w-1/2 w-3/5">
                <button form="store-button" type="submit" class="font-bold inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-2 border-green-500 hover:bg-green-500 hover:text-white leading-5 rounded-3xl focus:outline-none focus:ring ring-gray-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                投稿する
                </button>
            </div>
        </form>
    </div>
</section>
@endsection