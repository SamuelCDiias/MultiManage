@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between mt-6 mb-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span hidden>
                {!! __('pagination.previous') !!}
            </span>
        @else
            <button wire:click="previousPage" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-transparent border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </button>
        @endif

        {{-- Pagination Links --}}
        <div class="flex space-x-2">
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-500 rounded-md">
                        {{ $page }}
                    </span>
                @else
                    <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-transparent border border-gray-300 leading-5 rounded-md hover:bg-blue-100 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {{ $page }}
                    </button>
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-transparent border border-gray-300 leading-5 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </button>
        @else
            <span hidden>
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
