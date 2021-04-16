<div class="lg:pt-0 pt-1 lg:w-3/5 w-11/12 mx-auto h-24">
    <ul class="flex h-full">
        <li class="flex flex-col w-1/2 pt-12">
            <a class="text-lg mx-auto w-fit-content inline-block text-gray-900 hover:text-gray-600 {{ $hasArticles ? 'border-b border-black border-solid font-bold' : '' }}"
            href="{{ route('users.show', ['name' => $user->name]) }}">
            記事
            </a>
        </li>
        <li class="flex flex-col w-1/2 pt-12">
            <a class="text-lg mx-auto w-fit-content inline-block text-gray-900 hover:text-gray-600 {{ $hasLikes ? 'border-b border-black border-solid font-bold' : '' }}"
            href="{{ route('users.likes', ['name' => $user->name]) }}">
            いいね
            </a>
        </li>
    </ul>
</div>