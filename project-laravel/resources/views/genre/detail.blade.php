@extends('layout.master')

@section('judul')
Detail Genre
@endsection

@section('content')
<a href="/genre" class="btn btn-primary btn-sm">Kembali</a>

<h1>{{$genre->name}}</h1>
@endsection