<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

</head>

<body>


    <nav class="navbar bg-1 fg-2" >
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Blog</span>
    </div>
    </nav>

    <div class="d-grid gap-2  md:d-flex md:justify-content-end mx-12 mt-7">
        <button class="btn-solid theme-success" type="button">Create Post</button>
    </div>

    <table class="table table-striped container mt-3">

        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody >

          @foreach ($posts as $post)
                <tr>
                    <th scope="row"> {{ $post['id'] }} </th>
                    <td> {{ $post['title'] }} </td>
                    <td> {{ $post['posted_by'] }} </td>
                    <td> {{ $post['created_at'] }} </td>
                    <td class="col">
                        <a href="#" class="btn-solid theme-info btn-sm">View</a>
                        <a href="#" class="btn-solid theme-primary btn-sm">Edit</a>
                        <a href="#" class="btn-solid theme-danger btn-sm">Delete</a>
                    </td>
                </tr>
          @endforeach


        </tbody>

    </table>


    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>

</html>
