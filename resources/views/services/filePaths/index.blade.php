@extends('layouts.app')

@section('content')

<section class="main">
    <div name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Service Paths
                        </h2>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('servicePaths.create') }}" class="btn btn-outline font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            New Service Path
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends('layouts.sidebar')

    @if(!empty($paths))
        @foreach($paths as $path)
        <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $path->path }}
                            </span>
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <span>
                                {{ $path->siteId }}
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
                        <h2>
                            You have not created any service paths
                        </h2>
                    </div>

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('servicePaths.create') }}">
                            Create New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection
