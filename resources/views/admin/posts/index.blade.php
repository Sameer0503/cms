<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Posts</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (Session::has('delete_messege'))
                        <div class="alert alert-danger">
                            {{Session::get('delete_messege')}}
                        </div>
                    @elseif (Session::has('create_messege'))
                    <div class="alert alert-success">
                        {{Session::get('create_messege')}}
                    </div>
                    @elseif (Session::has('update_messege'))
                    <div class="alert alert-primary">
                        {{Session::get('update_messege')}}
                    </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)                                
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>
                                    @can('update', $post)
                                    <a href="{{route('post.edit', $post->id)}}">
                                    @endcan
                                        {{$post->title}}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{$post->image}}" class="img-thumbnail" alt=""> 
                                </td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>
                                    @can('delete', $post)
                                    <form action="{{route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>