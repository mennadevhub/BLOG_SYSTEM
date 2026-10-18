<x-layout>

    <x-slot:title>
       store Post Page
    </x-slot:title>

    <x-slot:blogLink>
        <a class="navbar-brand mb-0 h1" href="#">Blog</a>
    </x-slot:blogLink>


    <div class="alert theme-success" role="alert">
    <vstack>
        <h4 class="alert-heading mb-2">Post Created Successfully!</h4>
    </vstack>
    </div>

    <div class="d-grid gap-2  md:d-flex md:justify-content-end mx-12 mt-7">
        <a href="{{ route('posts.create') }}" class="btn-solid theme-success">ADD NewPost</a>
    </div>

</x-layout>
