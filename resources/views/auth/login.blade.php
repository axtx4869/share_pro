@extends('layouts.app')

@section('title', '| ログイン')

@section('content')
<div class="container grid place-items-center max-w-full min-h-screen bg-indigo-500 mx-auto p-6">
    <div class="max-w-sm mx-auto md:px-6 px-0 bg-black">
        <div class="flex flex-wrap">
            <div class="w-full relative">
                <div class="pt-6 md:mt-6">
                    <h1 class="text-center text-3xl text-white">{{ config('app.name') }}</h1>
                    <h2 class="text-center text-xl text-white">ログイン</h2>
                    <div class="px-2 text-white text-center">
                        <p>各種機能を利用するにはログインする必要があります。</p>
                    </div>
                    <form class="mt-4" method="POST" action="{{ url('login') }}">
                    @csrf
                        <div class="mx-auto max-w-lg ">
                            <div class="py-1">
                                @if ($errors->any())
                                    <div class="bg-red-200 p-3 my-3 rounded">
                                        <ul class="text-red-600 text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-disc ml-4 mb-1">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif               
                            </div>
                            <div class="py-1">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス"
                                        class="form-control @error('email') is-invalid @enderror text-white bg-black m-auto text-md block px-3 py-2 rounded-3xl duration-200 md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                                @error('email')
                                    <span class="invalid-feedback text-red-600 text-xs flex justify-center my-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="py-1">
                                <div class="flex justify-between sm:flex-row flex-col">
                                </div>
                                <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="パスワード"
                                        class="form-control @error('password') is-invalid @enderror text-white bg-black m-auto text-md block px-3 py-2 duration-200 rounded-3xl md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                                <input type="hidden" name="remember" id="remember" value="on">
                            </div>
                            <button type="submit" class="m-auto mt-3 sm:text-lg text-base font-semibold border-2 border-green-500 w-1/2 text-white rounded-3xl delay-75
                                            px-6 py-2 block shadow-xl hover:bg-green-500">
                                ログイン
                            </button>
                        </div>
                    </form>
                    <div class="px-2 py-6">
                        <p class="text-center text-white">アカウントをまだ作成していませんか？</p>
                        <a href="{{ route('register') }}" class="block text-center text-blue-500">アカウントを作成する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
