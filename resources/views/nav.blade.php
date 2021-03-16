<header class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="#">
                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                </a>
            </div>
            <nav class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                ユーザー登録
                </a>
                <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                ログイン
                </a>
            </nav>
        </div>
    </div>
<!--モバイル-->
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                    </div>
                    <div id="sp-nav-x" class="-mr-2">
                        <button id="sp-nav-x-btn" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span>&Chi;</span>
                        </button>
                        <button id="sp-nav-show-login-btn" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span>☰</span>
                        </button>
                    </div>
                </div>
            </div>
            <nav id="sp-login-btn" class="py-6 px-5 space-y-6 hidden">
                <div>
                    <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        ログイン
                    </a>
                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                        ユーザー登録はお済みですか?
                    </p>
                    <a href="#" class="grid text-center text-indigo-600 hover:text-indigo-500">
                    ユーザー登録
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>