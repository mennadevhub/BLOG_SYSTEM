<x-layout>

    <x-slot:title>
        Create Post Page
    </x-slot:title>


    <div class="card container mt-5">

        <div class="card-header">
           <h4><strong>Create Post</strong></h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                {{-- <div class="mb-3">
                    <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id" >
                </div> --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required autofocus >
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label" required>Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" ></textarea>
                </div>

                {{-- <div class="mb-3">
                    <label for="created_by" class="form-label">Posted By</label>
                    <select class="form-control" name="created_by">
                        @foreach($users as $user)
                            <option>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
{{--
                <div class="mb-3">
                    <label for="created_at" class="form-label">Created At</label>
                    <input type="datetime-local" class="form-control" id="created_at" name="created_at" >
                </div>

                <div class="mb-3">
                    <label for="updated_at" class="form-label">Updated At</label>
                    <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" >
                </div> --}}

                <button type="submit" class=" mt-5 btn-solid theme-success">Submit</button>

            </form>

        </div>

    </div>


</x-layout>
