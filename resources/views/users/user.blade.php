<div class="lg:w-2/5 w-full mx-auto h-24">
    <div class="flex px-4 {{ Auth::id() == $user->id ? 'justify-center' : 'justify-around' }}">
        <h2 class="text-6xl text-gray-900">
            {{ $user->name }}
        </h2>
        @if( Auth::id() !== $user->id )
        <div class="flex justify-center flex-col">
            <follow-button
            class="ml-auto"
            :initial-is-followed='@json($user->isFollowed(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
            >
            </follow-button>
        </div>
        @endif
    </div>
    <div class="">
        <div class="flex justify-center w-11/12 mx-auto">
            <div class="pl-4">
                @if($user->count_followings === 0)
                <span class="text-gray-900 hover:text-gray-600">
                    0 フォロー
                </span>
                @else
                <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-gray-900 hover:text-gray-600">
                    {{ $user->count_followings }} フォロー
                </a>
                @endif
            </div>
            <div class="pl-4">
                @if($user->count_followers === 0)
                <span class="text-gray-900 hover:text-gray-600">
                    0 フォロワー
                </span>
                @else
                <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-gray-900 hover:text-gray-600">
                    {{ $user->count_followers }} フォロワー
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
