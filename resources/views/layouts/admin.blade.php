<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
</head>
<body>

    <header>
        <h1>Administration</h1>
        <nav>
            <a href="{{ route('admin.destinations.index') }}">Destinations</a> |
            <a href="{{ route('admin.crews.index') }}">Crew</a> |
            <a href="{{ route('admin.technologies.index') }}">Technologies</a> |
            <a href="{{ route('dashboard') }}">Retour Dashboard</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
