
<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Login to Your Account</h2>

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>

        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required >
            </div>

            <button type="submit" class="btn-solid theme-primary w-100">
                Login
            </button>
        </form>

        <p class="text-center mt-3">
            Don't have an account?
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
</x-layout>
