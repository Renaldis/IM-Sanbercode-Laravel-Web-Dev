@extends('layout.master')

@section('judul')
Create Cast
@endsection

@section('content')
<a href="/cast" class="btn btn-primary btn-sm">Back</a>

<form action="/cast" method="POST">
    @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Age</label>
    <input type="number" class="form-control" name="age">
  </div>
    @error('age')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea name="bio" cols="30" rows="10" class="form-control"></textarea>
  </div>
  @error('bio')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection