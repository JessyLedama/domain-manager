<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="sidenav">
    <img class="img-responsive" src="{{ asset('img/logo.jpg') }}" alt="Logo">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('domains.index') }}">Domains</a>
    <a href="{{ route('sites.index') }}">Sites</a>
    <a href="{{ route('services.index') }}">Services</a>
</div>