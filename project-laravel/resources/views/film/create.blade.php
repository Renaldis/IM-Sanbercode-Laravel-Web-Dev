@extends('layout.master')

@section('judul')
Create Film
@endsection

@section('content')
<a href="/film" class="btn btn-primary btn-sm">Back</a>

<form action="/film" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label class="form-label">Judul Film</label>
    <input type="text" class="form-control" name="title">
  </div>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Ringkasan</label>
    <input type="text" class="form-control" name="summary">
  </div>
    @error('summary')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Tahun Rilis</label>
    <input type="date" class="form-control" name="year">
  </div>
    @error('year')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Poster</label>
    <input type="file" class="form-control" name="poster">
  </div>
    @error('poster')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
      <select name="genre_id" id="">
        <option value="">--Pilih Genre--</option>
        @forelse ($genre as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
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