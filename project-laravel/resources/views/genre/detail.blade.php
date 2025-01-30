@extends('layout.master')

@section('judul')
Detail Genre
@endsection

@section('content')
<a href="/genre" class="btn btn-primary btn-sm">Kembali</a>

<h1>{{$genre->name}}</h1>

<div class="row">
    @forelse ($genre->film as $item)
    <div class="col-4">
        <div class="card overflow-hidden">
            <img src="/images/{{$item->poster}}" class="card-img-top img-fluid" alt="..." style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h3 class="card-title">{{$item->title}}</h3>
                <p class="card-text">{{Str::limit($item->summary,200)}}</p>

                <a href="/film/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Detail Film</a>
            </div>

        </div>
    </div>
    @empty
    <h3>Genre ini Tidak ada Film</h3>
    @endforelse
</div>

@endsection