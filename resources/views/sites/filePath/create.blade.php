@extends('layouts.app')

@section('content')
<section class="main">
    <!-- header -->
    <div name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Create a New Site File Path
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @extends('layouts.sidebar')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" class="input-group" action="{{ route('sitePath.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label for="path"> Path </label>
                            <input class="form-control" type="text" name="path" placeholder="Path">
                        </div>

                        <div class="form-group">
                            <label for="siteId"> Site </label>
                            <select name="siteId">
                                @foreach($sites as $site)
                                    <option value="{{ $site->serverName }}">
                                        {{ $site->serverName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection