@extends('layout.master')

@section('judul')
Edit Film
@endsection

@section('content')
<a href="/film" class="btn btn-primary btn-sm">Back</a>

<form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
  <div class="mb-3">
    <label class="form-label">Judul Film</label>
    <input type="text" class="form-control" name="title" value="{{$film->title}}">
  </div>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Ringkasan</label>
    <textarea class="form-control" name="summary" id="" cols="10" rows="5">{{$film->summary}}</textarea>
  </div>
    @error('summary')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Tahun Rilis</label>
    <input type="number" class="form-control" name="year" value="{{$film->year}}">
  </div>
    @error('year')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Poster</label>
    <input type="file" class="form-control" name="poster" value="{{$film->year}}">
  </div>
    @error('poster')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
      <select name="genre_id" id="" class="form-control">
        <option value="">--Pilih Genre--</option>
        @forelse ($genre as $value)
          @if ($value->id === $film->genre_id)
          <option value="{{$value->id}}" selected>{{$value->name}}</option> 
          @else
          <option value="{{$value->id}}">{{$value->name}}</option> 
          @endif
        @empty
            <option value="">Tidak ada data genre</option>
        @endforelse
      </select>
  </div>
    @error('genre_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection