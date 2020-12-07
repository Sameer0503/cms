<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>
    <div>
        <form action="{{route('post.patch', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{$post->title}}">
            </div>
                <img src="{{$post->image}}" class="img-thumbnail" alt="">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <input type="submit" value="Edit Post" class="btn btn-primary">
            </div>
        </form>
    </div>
    @endsection
</x-admin-master>