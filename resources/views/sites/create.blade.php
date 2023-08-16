<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" class="input-group" action="{{ route('sites.store') }}">
                        @csrf 
                        <div class="form-group">
                            <label for="path"> Path </label>
                            <input class="form-control" type="text" name="path" placeholder="Path">
                        </div>

                        <div class="form-group">
                            <label for="domain"> Domain</label>
                            <select name="domainId">
                                <option> Select a Domain </option>
                                @foreach($domains as $domain)
                                    <option value="{{ $domain->name }}"> {{ $domain->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="serverName"> serverName</label>
                            <input class="form-control" type="text" name="serverName" placeholder="serverName">
                        </div>

                        <div class="form-group">
                            <label for="serverAlias"> serverAlias</label>
                            <input class="form-control" type="text" name="serverAlias" placeholder="serverAlias">
                        </div>

                        <div class="form-group"> 
                            <label for="proxyPass"> proxyPass </label>
                            <input class="form-control" type="text" name="proxyPass" placeholder="proxyPass">
                        </div>

                        <div class="form-group">
                            <label for="proxyPassReverse"> 
                                proxyPassReverse
                            </label>
                            <input class="form-control" type="text" name="proxyPassReverse" placeholder="proxyPassReverse">
                        </div>

                        <div class="form-group">
                            <label for="rewriteCond1"> rewriteCond</label>
                            <input class="form-control" type="text" name="rewriteCond1" placeholder="rewriteCond1">
                        </div>

                        <div class="form-group">
                            <label for="rewriteCond2"> rewriteCond</label>
                            <input class="form-control" type="text" name="rewriteCond2" placeholder="rewriteCond2">
                        </div>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
