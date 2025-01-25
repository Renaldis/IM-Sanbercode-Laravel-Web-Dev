@extends('layout.master')

@section('judul')
Detail Cast
@endsection

@section('content')
<a href="/cast" class="btn btn-primary btn-sm">Back</a>
<h1>{{$cast->name}}</h1>
<p>{{$cast->age}}</p>
<p>{{$cast->bio}}</p>
@endsection