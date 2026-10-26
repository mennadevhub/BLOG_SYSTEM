<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'Blog' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <h3>Blogga</h3>
            </a>

            <div class="d-flex align-items-center gap-5">

                @auth

                    <a href="{{ route('posts.index') }}" class="nav-link">
                        Posts
                    </a>

                    <span>
                        Welcome, {{ auth()->user()->name }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn-solid theme-dark">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}" class="btn-solid theme-secondary">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn-solid theme-primary">
                        Register
                    </a>

                @endauth

            </div>
        </div>
    </nav>



    {{ $slot }}

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

</body>

</html>

