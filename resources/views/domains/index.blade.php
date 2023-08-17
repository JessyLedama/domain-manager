@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/domains.css') }}">

@section('content')
    <section class="main">
        <!-- header -->
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
                            <a href="{{ route('domains.create') }}" class="btn btn-outline font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                New Domain
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @extends('layouts.sidebar')

        <livewire:domains>
        
    </section>
@endsection
