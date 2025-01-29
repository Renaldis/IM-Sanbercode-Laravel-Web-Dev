@extends('layout.master')

@section('judul')
Create Genre
@endsection

@section('content')
<a href="/genre" class="btn btn-primary btn-sm">Back</a>

<form action="/genre" method="POST">
    @csrf
  <div class="mb-3">
    <label class="form-label">Nama Genre</label>
    <input type="text" class="form-control" name="name">
  </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection