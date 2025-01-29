@extends('layout.master')

@section('judul')
Halaman List Film
@endsection

@section('content')

<a href="/film/create" class="btn btn-primary btn-sm mb-4">Tambah Film</a>

<div class="row">
    @forelse ($film as $item)
    <div class="col-4">
        <div class="card overflow-hidden">
            <img src="/images/{{$item->poster}}" class="card-img-top img-fluid" alt="..." style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h3 class="card-title">{{$item->title}}</h3>
                <p class="card-text">{{Str::limit($item->summary,200)}}</p>
                {{-- <p class="card-title">
                    <strong>Genre:</strong> {{ $film->genre_id ?? 'Tidak ada genre' }}
                </p> --}}
                <a href="/film/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Detail Film</a>
                @auth
                <div class="row my-2">
                    <div class="col">
                        <a href="/film/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/film/{{$item->id}}" method="POST">
                            @csrf
                            @method("delete")
                            <input type="submit" class="btn btn-danger btn-block btn-sm" value="Delete">
                        </form>
                    </div>
                </div>
                @endauth
            </div>

        </div>
    </div>
    @empty
        <h2>Tidak ada Film</h2>
    @endforelse

</div>

@endsection