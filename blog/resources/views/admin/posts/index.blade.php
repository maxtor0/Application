<x-admin-master>

    @section('content')

        <h1>All posts</h1>

        @if(session('message-delete'))
            <div class="alert alert-danger">{{session('message-delete')}}</div>
        @endif
        @if(session('message-success'))
            <div class="alert alert-info">{{session('message-success')}}</div>
        @endif
        @if(session('message-updated'))
            <div class="alert alert-primary">{{session('message-updated')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>POST ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>POST ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td class="font-weight-bolder">{{$post->title}}</td>
                                <td><img height="45px" src="{{asset($post->post_image)}}" alt=""></td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>
                                    @can('view',$post)
                                    <a href="{{route('post.edit',$post->id)}}">
                                        <button class="btn btn-primary" >Edit post</button></a>
                                    @endcan
                                </td>
                                <td>
                                    @can('view', $post)

                                    <form method="post" action="{{route('post.destroy',$post->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
