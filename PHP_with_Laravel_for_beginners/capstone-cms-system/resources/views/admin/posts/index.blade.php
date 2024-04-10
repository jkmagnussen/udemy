<x-admin-master>

    @section('content')

    <h2>All Posts</h2>

    @if(Session::has('message'))
    <div class="alert alert-danger">{{Session::get('message')}}</div>
    @elseif(Session::has('uploaded'))
    <div class="alert alert-success">{{Session::get('uploaded')}}</div>
    @elseif(Session::has('post-update-message'))
    <div class="alert alert-success">{{Session::get('post-update-message')}}</div>
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
                            <th>Id</th>
                            <th>Creator</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Creator</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>

                            <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                            <td>
                                <image width="100px" src="{{asset($post->post_image)}}" alt="">
                                </image>
                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>

                                @can('view', $post)
                                <form method="post" action="{{route('post.destroy', $post->id)}}"
                                    enctype="multipart/form-data">
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

    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>

    @endsection

    @section('scripts')





    <!-- Page level plugins -->


    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}">
    </script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->


    @endsection

</x-admin-master>