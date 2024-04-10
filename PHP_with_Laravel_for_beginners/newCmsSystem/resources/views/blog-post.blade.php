<x-home-master>

    @section('content')


    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Single Comment -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle"
            src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSnJsqqSgCYugqQesEnbAW7Z36GTYyUCZQSdraxzrzagrYFWZP_810W-05c1ubDDtawLCRh6uZMh7UCf9o/50x50"
            alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
            ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle"
            src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSnJsqqSgCYugqQesEnbAW7Z36GTYyUCZQSdraxzrzagrYFWZP_810W-05c1ubDDtawLCRh6uZMh7UCf9o/50x50"
            alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
            ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle"
            src="http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSnJsqqSgCYugqQesEnbAW7Z36GTYyUCZQSdraxzrzagrYFWZP_810W-05c1ubDDtawLCRh6uZMh7UCf9o/50x50"
            alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
            ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>


    <!-- Comment with nested comments -->
    <div class="media mb-4">

        @endsection
</x-home-master>