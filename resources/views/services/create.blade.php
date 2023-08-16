<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" class="input-group" action="{{ route('services.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label for="path"> Description </label>
                            <input class="form-control" type="text" name="description" placeholder="Description">
                        </div>

                        <div class="form-group">
                            <label for="domain"> Version</label>
                            <input type="text" name="version" placeholder="Version">
                        </div>

                        <div class="form-group">
                            <label for="serverName"> Type</label>
                            <input class="form-control" type="text" name="type" placeholder="Type">
                        </div>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
