<x-layout>

    <x-slot:title>
        Edit Post Page
    </x-slot:title>


    <div class="container">

        <h2 class="mb-4">Edit Post</h2>

        <form  method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">

            @csrf
            @method('PATCH')

            {{-- @dd($post) --}}


            <div class="mb-3">
                <label class="form-label"> Title </label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-3">
                <label class="form-label"> Content </label>
                <textarea name="content" class="form-control" rows="4">{{ old('content', $post->content) }}</textarea>
            </div>


            <button class="btn-solid theme-primary" type="submit"> Update </button>

        </form>

    </div>


</x-layout>
