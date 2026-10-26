
<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Create Account</h2>

        @if ($errors->any())

            <div class="alert theme-danger" role="alert">
                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>

        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required  autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Confirm Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn-solid theme-primary w-100">
                Register
            </button>
        </form>

        <p class="text-center mt-3">
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</x-layout>
