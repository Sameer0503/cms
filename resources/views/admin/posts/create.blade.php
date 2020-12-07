<x-admin-master>
    @section('content')
    <div class="row" style="margin-left: 0.1%">
        <h1 class="h3 mb-4 text-gray-800">Create a Post</h1>
    </div>
    <div>
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Create Post" class="btn btn-primary">
            </div>
        </form>
    </div>
    @endsection
</x-admin-master>