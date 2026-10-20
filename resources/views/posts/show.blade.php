<x-layout>

    <x-slot:title>
      post Details Page
    </x-slot:title>

      <x-slot:blogLink>
        <a class="navbar-brand mb-0 h1" href="{{ route('posts.index') }}">Blog</a>
    </x-slot:blogLink>

    <div class="card container mt-5">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>

</x-layout>


