<div class="flex md:justify-around justify-between md:w-1/2 w-11/12 mt-4 mx-auto border-b-2 border-dashed border-black">
    <div class="flex flex-row w-1/2">
        <div class="text-center grid place-items-center">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-lg">
                <i class="fas fa-user-circle fa-2x"></i>
            </a>
        </div>
        <div class="pl-4 grid place-items-center">
            <h2 class="my-auto">
                <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-3xl">{{ $person->name }}</a>
            </h2>
        </div>
    </div>
    @if( Auth::id() !== $person->id )
    <div class="w-32 grid place-items-center p-2">
        <follow-button
        class="text-center my-auto"
        :initial-is-followed='@json($person->isFollowed(Auth::user()))'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
        >
        </follow-button>
    </div>
    @else
    <div class="w-32">
    </div>
    @endif
</div>