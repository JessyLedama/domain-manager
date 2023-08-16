<x-app-layout>
    <x-slot name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Services
                        </h2>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            New
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @if(count($services) > 0)
        @foreach($services as $service)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $service }}
                            </span>
                        </div>
                        <!-- <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $service }}
                            </span>
                        </div> -->
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        No Services yet <br />

                        <a class="btn btn-primary" href="{{ route('services.create') }}"> Add New Service </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
