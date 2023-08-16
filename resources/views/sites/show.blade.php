<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span>
                        {{ $site->serverName }}
                    </span>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span>
                        {{ $site->proxyPass }}
                    </span>
                </div>
            </div>
        </div>
    </div>        

</x-app-layout>
