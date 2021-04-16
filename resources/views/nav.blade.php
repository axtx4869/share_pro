<header class="fixed w-full bg-black bg-opacity-75 z-10">
    <div class="lg:block hidden max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
            <div>
                <a href="{{route('articles.index')}}" class="text-3xl font-bold text-white">SHARE PRO</a>
            </div>
            <nav class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                @guest
                    <a href="{{ route('register') }}" class="hover:border-transparent border-b border-green-500 duration-700 whitespace-nowrap text-base font-medium text-gray-300">
                    ユーザー登録
                    </a>
                    <a href="{{ route('login') }}" class="hover:border-transparent border-b border-green-500 duration-700 ml-8 whitespace-nowrap text-base font-medium text-gray-300">
                    ログイン
                    </a>
                @endguest
                @auth
                    <form id="logout-button" action="{{ route('logout') }}" method="POST" class="my-auto mr-4">
                    @csrf
                        <button form="logout-button" type="submit" class="border-b hover:border-transparent border-green-500 duration-700 whitespace-nowrap text-base font-medium text-gray-300 focus:outline-none">
                        ログアウト
                        </button>
                    </form>
                    <a href="{{ route('users.show', ['name' => auth()->user()->name]) }}" class="hover:border-transparent border-b border-green-500 duration-700 whitespace-nowrap text-base font-medium text-gray-300">
                    マイページ
                    </a>
                @endauth
            @unless(\Route::is('articles.create'))
                @unless(\Route::is('articles.show'))
                    <a href="{{ route("articles.create") }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        投稿する
                    </a>
                @endunless
            @endunless
            @if(\Route::is('articles.show'))
                @if(Auth::id() === $article->user->id)
                <a href="{{ route("articles.edit", ['article' => $article]) }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    更新する
                </a>
                <button onclick="openModal(true)" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    削除する
                </button>
                @else
                <a href="{{ route("articles.create") }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    投稿する
                </a>
                @endif
            @endif
            </nav>
        </div>
    </div>
<!--モバイル-->
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-black bg-opacity-75 divide-y-2">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div class="flex justify-center w-full">
                        <a href="{{route('articles.index')}}" class="text-xl font-bold text-white">SHARE PRO</a>
                    </div>
                    <div id="sp-nav-x" class="-mr-2">
                        <button id="sp-nav-x-btn" type="button" class="bg-black bg-opacity-75 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span>&cross;</span>
                        </button>
                        <button id="sp-nav-show-login-btn" type="button" class="rounded-md p-2 inline-flex items-center justify-center text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span>☰</span>
                        </button>
                    </div>
                </div>
            </div>
            <nav id="sp-login-btn" class="py-6 px-5 space-y-6 hidden duration-700">
                @guest
                    <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        ログイン
                    </a>
                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                        ユーザー登録はお済みですか?
                    </p>
                    <a href="{{ route('register') }}" class="grid text-center text-indigo-600 hover:text-indigo-500">
                    ユーザー登録
                    </a>
                @endguest
                @auth
                    <a href="{{ route('users.show', ['name' => auth()->user()->name]) }}" class="w-fit-content m-auto hover:border-transparent border-b border-green-500 duration-700 flex justify-center whitespace-nowrap text-base font-medium text-gray-300 ">
                        マイページ
                    </a>
                    <form id="sp-logout-button" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button form="sp-logout-button" type="submit" class="hover:border-transparent border-b border-green-500 duration-700 flex justify-center m-auto whitespace-nowrap text-base font-medium text-gray-300">
                            ログアウト
                        </button>
                    </form>
                @endauth
                @unless(\Route::is('articles.create'))
                    <a href="{{ route('articles.create') }}" class="w-fit-content m-auto hover:border-transparent border-b border-green-500 duration-700 flex justify-center whitespace-nowrap text-base font-medium text-gray-300">
                        投稿する
                    </a>
                @endunless
                @if(\Route::is('articles.show'))
                @if(Auth::id() === $article->user->id)
                    <a href="{{ route("articles.edit", ['article' => $article]) }}" class="w-fit-content m-auto hover:border-transparent border-b border-green-500 duration-700 flex justify-center whitespace-nowrap text-base font-medium text-gray-300">
                        更新する
                    </a>
                    <button onclick="openModal(true)" class="hover:border-transparent border-b border-green-500 duration-700 mx-auto flex justify-center whitespace-nowrap text-base font-medium text-gray-300">
                        削除する
                    </button>
                @endif
            @endif
            </nav>
        </div>
    </div>
</header>
