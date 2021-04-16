@csrf
    <div class="m-auto mt-3 w-5/6">
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
    <div class="form-control m-auto mt-3 w-5/6">
        <p class="text-gray-800">教材タイトル</p>
        <input type="text" name="title" placeholder="教材のタイトルを入力してください。" value="{{ $article->title ?? old('title') }}" class="border p-2 block w-full bg-gray-200 outline-none">
    </div>
    <div class="form-control m-auto mt-3 w-5/6">
        <p class="text-gray-800">タグ</p>
        <article-tags-input 
            :initial-tags='@json($tagNames ?? [])'
            :autocomplete-items='@json($allTagNames ?? [])'>
        </article-tags-input>
    </div>
    <div class="form-control m-auto mt-3 w-5/6">
        <p class="text-gray-800">教材リンク</p>
        <input type="url" name="url" placeholder="教材のURLを入力してください。" value="{{ $article->url ?? old('url') }}" class="border p-2 w-full mt-3 bg-gray-200 outline-none">
    </div>
    <div class="form-control m-auto mt-3 w-5/6">
        <p class="text-gray-800">記事本文</p>
        <textarea name="body" cols="10" rows="3" placeholder="本文をご入力ください。" class="h-64 border p-2 mt-3 w-full bg-gray-200 outline-none">
        {{ $article->body ?? old('body') }}
        </textarea>
    </div>
    <div class="form-control m-auto mt-3 w-5/6">
        <p class="text-gray-800">アイキャッチ画像</p>
        <input type="file" name="image" id="file1"　class="border p-2 w-full mt-3 bg-gray-200" value="{{ $article->image ?? old('image') }}">
    </div>
