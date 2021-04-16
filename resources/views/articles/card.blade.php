<article class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">
    <div class="w-full flex flex-col items-stretch min-h-full mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
        <a class="md:flex-shrink-0 w-full" href="{{ route("articles.show", ['article' => $article]) }}">
        @empty($article->image)
            <img
                src="{{ asset('storage/images/no_image.png') }}"                
                alt="No Image"
                class="h-56 object-cover w-full rounded-lg rounded-b-none md:h-56 z-0"/>
        @else
            <img alt="アイキャッチ画像" class="h-56 w-full object-fill object-center rounded border border-gray-200 z-0" src="{{ asset('storage/images/'.$article->image) }}">
        @endempty
        </a>
        <div class="flex flex-col h-full py-3">
            <div class="flex flex-1 flex-wrap items-center w-full px-2 py-3">
                <a href="{{ route("articles.show", ['article' => $article]) }}" class="w-full text-center hover:underline">
                    <h2 class="font-sans text-lg font-semibold tracking-normal text-black truncate">
                    {{ $article->title }}
                    </h2>
                </a>
            </div>
            <div class="flex-1 grid" style="min-height: 140px">
            <hr class="border-solid border border-gray-200">
            @empty($article->tags[0])
            @else
                <div class="flex justify-between">
            @endempty 
                @foreach($article->tags as $tag)
                    @if($loop->first)
                    <div class="flex items-center flex-wrap p-2">
                    @endif   
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="text-md font-medium mb-1">
                            <div class="text-xs border border-gray-500 text-gray-600 hover:bg-black hover:text-white border-solid rounded-lg p-1 ml-1 hover:shadow-3xl">
                                {{ $tag->hashtag }} 
                            </div>
                        </a>   
                    @if($loop->last)
                    </div>
                    @endif
                @endforeach
                @empty($article->tags[0])
                @else
                    </div>
                @endempty
                <div class="flex justify-between px-3 pb-3">
                    <div class="flex w-3/4">
                        <div class="grid place-items-end">
                            <i class="fas fa-user-circle text-3xl"></i>
                        </div>
                        <div class="grid place-items-end">
                            <div class="flex flex-col mx-2">
                                <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="font-semibold text-gray-700 hover:underline">
                                {{ $article->user->name }}
                                </a>
                                <time class="mx-1 text-xs text-gray-600" itemprop=”datepublished” datetime="{{ $article->created_at->format('Y-m-d') }}">
                                    {{ $article->created_at->format('Y/m/d') }}
                                </time>
                            </div>
                        </div>
                    </div>
                    <div class="h-auto grid place-items-end w-1/4">
                        <div class="text-md font-medium text-gray-500 flex flex-row items-center">
                            <article-like 
                            :initial-is-liked='@json($article->isLiked(Auth::user()))'
                            :initial-count-likes='@json($article->count_likes)'
                            :authorized='@json(Auth::check())'
                            endpoint="{{ route('articles.like', ['article' => $article]) }}">
                            </article-like>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>