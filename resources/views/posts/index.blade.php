<x-layout>

    <x-slot:title>
        Posts Page
    </x-slot:title>

    <x-slot:blogLink>
        <a class="navbar-brand mb-0 h1" href="#">Blog</a>
    </x-slot:blogLink>

    <div class="d-grid gap-2  md:d-flex md:justify-content-end mx-12 mt-7">
        <a href="{{ route('posts.create') }}" class="btn-solid theme-success">Create Post</a>
    </div>

    <table class="table table-striped container mt-3">

        <thead>

            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>

        </thead>

        <tbody >

          @foreach ($posts as $post)
                <tr>
                    {{-- <th scope="row"> {{ $post['id'] }} </th> this true alse but no use it --}}
                    <th scope="row"> {{ $post->id }} </th>
                    <td> {{ $post->title }} </td>
                      <td> {{ $post->content }} </td>
                    <td> {{ $post->created_by }} </td>
                    <td> {{ $post->created_at }} </td>
                    <td class="col">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn-solid theme-info btn-sm" >View</a>
                        <a href="#" class="btn-solid theme-primary btn-sm">Edit</a>
                        <a href="#" class="btn-solid theme-danger btn-sm">Delete</a>
                    </td>
                </tr>
          @endforeach

        </tbody>

    </table>

</x-layout>

