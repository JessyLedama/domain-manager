@extends('layouts.app')

@section('content')

<section class="main">
    <div name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Domains
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
    </div>

    @extends('layouts.sidebar')

    @if(!empty($domains))
        @foreach($domains as $domain)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $domain->name }}
                            </span>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $domain->url }}
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
                        No Domains yet <br />

                        <a class="btn btn-primary" href="{{ route('domains.create') }}"> Add New Domains </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

</section>
@endsection
