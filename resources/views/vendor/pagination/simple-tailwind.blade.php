@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="w-full my-6 justify-around flex">
        @unless ($paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-gray-200 hover:bg-green-500 hover:text-white leading-5 rounded-3xl focus:outline-none transition ease-in-out duration-150">
            « 前のページへ
            </a>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 hover:bg-green-500 hover:text-white leading-5 rounded-3xl focus:outline-none transition ease-in-out duration-150">
            次のページへ »
            </a>
        @endif
    </nav>
@endif
