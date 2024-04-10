<x-admin-master>
    @section('content')

    @if(session()->has('permission-updated'))

    <div class="alert alert-success">
        {{session('permission-updated')}}
    </div>
    @endif

    <div class="row">
        <div class="col-sm-6">

            <h1>Edit: {{$permissions->name}}</h1>
            @if(session()->has('role-updated'))

            <div class="alert alert-success">
                {{session('role-updated')}}
            </div>
            @endif


            <form method="post" action="{{route('permissions.update', $permissions->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$permissions->name}}" @error('name') role-updated @enderror>
                </div>
                <button class="btn btn-primary">update</button>
            </form>


        </div>
    </div>



    @endsection
</x-admin-master>