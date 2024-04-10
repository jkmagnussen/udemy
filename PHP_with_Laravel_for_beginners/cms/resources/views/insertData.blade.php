@extends('layouts.app')

@section('content')

<h1>Insert Data</h1>

{{Form::open(array("route"=>"formCreate"))}}
{{Form::text('nameInsert')}}
{{Form::submit('Click me!')}}
{{ Form::close() }}
@stop