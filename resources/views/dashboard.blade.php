@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

<section class="main">
    <!-- header -->
    <div name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Dashboard
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

    <!-- Domains -->
    @if(!empty($domains))
        <div class="container">
            @foreach($domains as $domain)
                <div class="card">
                    <div class="card-body">
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
        </div>
    @endif

    <!-- Sites -->
    @if(!empty($sites))
        <div class="container">
            @foreach($sites as $site)
                <div class="card">
                    <div class="card-body">
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
            @endforeach
        
    @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            No Sites yet <br />

                            <a class="btn btn-primary" href="{{ route('sites.create') }}"> Add New Site </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($services))
        <div class="container">
            @foreach($services as $service)
                <div class="card">
                    <div class="card-body">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <span>
                                    {{ $service->description }}
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
        </div>
    @endif
</section>
@endsection
