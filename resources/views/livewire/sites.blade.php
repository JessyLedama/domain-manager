@if(!empty($sites))
    @foreach($sites as $site)
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <span>
                            {{ $site }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('sites.show', $site) }}">
                        You have not created any sites
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif