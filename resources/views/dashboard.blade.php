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
                </div>
            </div>
        </div>
    </div>

    @extends('layouts.sidebar')

    <!-- Domains -->
    @if(!empty($domains))
        <div class="container"> 
            <div class="card">
                <div class="card-body">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ count($domains) }}
                            </span>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if(count($domains) < 2)
                                <span>
                                    Domain
                                </span>
                            @else
                                <span>
                                    Domains
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>   
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

    <!-- Sites -->
    @if(!empty($sites))   
            <div class="card">
                <div class="card-body">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ count($sites) }}
                            </span>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if(count($sites) < 2)
                                <span>
                                    Site
                                </span>
                            @else
                                <span>
                                    Sites
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
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

    <!-- Services -->
    @if(!empty($services))   
        <div class="card">
            <div class="card-body">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <span>
                            {{ count($services) }}
                        </span>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if(count($services) < 2)
                            <span>
                                Service
                            </span>
                        @else
                            <span>
                                Services
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>  
    @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            No Services yet <br />

                            <a class="btn btn-primary" href="{{ route('services.create') }}"> Add New Domains </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection
