@extends('layouts.app')

@section('content')
<div class="container grid place-items-center max-w-full min-h-screen bg-indigo-500 mx-auto p-6">
    <div class="max-w-lg mx-auto md:px-6 px-0 pt-6 bg-black w-full">
        <div class="relative flex flex-wrap">
            <div class="w-full relative">
                <div class="md:mt-6">
                    <h1 class="text-center text-3xl text-white">{{ config('app.name') }}</h1>
                    <h2 class="text-center text-xl text-white">アカウント作成</h2>
                    <form class="mt-4" method="POST" action="{{ route('register') }}">
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
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ユーザー名 英数字3~16文字"
                                class="form-control @error('name') is-invalid @enderror text-white bg-black m-auto text-md block px-3 py-2 duration-200 rounded-3xl md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                                @error('name')
                                    <span class="invalid-feedback text-red-600 text-xs flex justify-center my-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror                
                            </div>
                            <div class="py-1">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス"
                                class="form-control @error('email') is-invalid @enderror text-white bg-black m-auto text-md block px-3 py-2 duration-200 rounded-3xl md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                                @error('email')
                                    <span class="invalid-feedback text-red-600 text-xs flex justify-center my-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="py-1">
                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="パスワード 英数字8文字以上"
                                class="form-control @error('password') is-invalid @enderror text-white bg-black m-auto text-md block px-3 py-2 duration-200 rounded-3xl md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                                @error('password')
                                    <span class="invalid-feedback text-red-600 text-xs flex justify-center my-2" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="py-1">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="パスワードを再入力してください"
                                class="form-control text-white bg-black m-auto text-md block px-3 py-2 duration-200 rounded-3xl md:w-3/4 w-10/12 focus:md:w-full focus:w-11/12 border-2 border-blue-500 shadow-md placeholder-gray-500 focus:border-green-500 focus:outline-none" 
                                >
                            </div>
                            <button type="submit" class="m-auto mt-3 md:text-lg text-sm font-semibold border-2 border-green-500 
                            md:w-3/5 w-10/12 text-white rounded-3xl delay-75 px-6 py-2 block shadow-xl hover:text-white hover:bg-green-500">
                                            アカウントを作成する
                            </button>
                        </div>
                    </form>
                    <div class="px-2 py-6">
                        <p class="text-base text-center text-white">アカウントを既にお持ちですか？</p>
                        <a href="{{ route('login') }}" class="block text-center text-blue-500">ログインする</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
