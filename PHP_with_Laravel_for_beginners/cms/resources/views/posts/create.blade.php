@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<!-- <form method="post" action="/posts"> -->

{!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\PostController@store', 'files'=>true]) !!}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::file('file', ['class'=>'form-control']) !!}
</div>


<div class="form-group">

    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    <!-- csrf_field(): This function can be used to generate the hidden input field in the HTML form. Note: This function should be written inside double curly braces. -->

    {{csrf_field()}}

</div>
{!! Form::close() !!}

@if(count($errors) > 0)

<div class="alert alert-dander">

    <ul>

        @foreach($errors->all() as $error)

        <li>{{$error}}</li>

        @endforeach

    </ul>

    @endif



    @endsection