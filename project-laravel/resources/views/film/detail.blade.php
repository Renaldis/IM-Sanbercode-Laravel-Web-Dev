@extends('layout.master')

@section('judul')
Halaman Detail Film
@endsection

@section('content')
 
    <img src="{{asset('images/'.$film->poster)}}" class="card-img-top img-fluid" alt="..." style="height: 400px; object-fit: contain">
    <div class="card-body">
        <h3 class="card-title">{{$film->title}}</h3>
        <p class="card-text">{{$film->summary}}</p>
        <a href="/film" class="btn btn-secondary btn-block btn-sm">Kembali</a>
    </div>
 
@endsection