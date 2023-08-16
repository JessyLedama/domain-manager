<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }} {{ $count }}
        </h2>
    </x-slot>

    @if(!empty($domains))
        @foreach($domains as $domain)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a href="{{ route('domains.show', $domain) }}">
                                {{ $domain->name }}
                            </a>
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
                        No Domains yet <br />

                        <a class="btn btn-primary" href="{{ route('domains.create') }}"> Add New Domains </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
