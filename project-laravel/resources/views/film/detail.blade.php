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

    <hr>

    <h4 class="text-cyan">Review</h4>

    <hr>

    <form action="/review/{{$film->id}}" method="POST">
        @csrf
        <input type="number" name="point" class="form-control" placeholder="Rating(1-5)">
        @error('point')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
        <textarea name="content" class="form-control my-3" placeholder="Type a comment" cols="10" rows="3"></textarea>
        @error('content')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <input type="submit" value="Submit Answer" class="bg-primary btn">
        @forelse ($film->review->sortByDesc('created_at') as $item)
        <div class="post mt-3">
            <div class="user-block">
            <img src="{{"/images/profile-icon.png"}}" class="mr-3" style="width: 40px" alt="...">
            <span class="username">
                <a href="#">{{ $item->user->name }}</a>
              </span>
              <span class="description">{{ $item->created_at->format('d M Y, H:i') }} WIB </span>
            </div>
            <!-- /.user-block -->
            <p>
                @for ($i = 1; $i <= $item->point; $i++)
                    <i class="fas fa-star fa-sm {{ $item->point >= $i ? 'text-warning' : 'text-muted' }}"></i>
                @endfor
            </p>
            <p>
                {{ $item->content }}
            </p>
          </div>
            @empty
            <div class="post mt-3">
                <p>--Belum ada Komentar--</p>
            </div>
        @endforelse
    </form>
 
@endsection