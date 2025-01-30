@extends('layout.master')

@section('judul')
Update Profile
@endsection

@section('content')
<form action="/profile/{{$detailProfile->id}}" method="POST">
    @csrf
    @method("PUT")
  <div class="mb-3">
    <label class="form-label">Umur</label>
    <input type="number" class="form-control" name="age" value="{{$detailProfile->age}}">
  </div>
    @error('umur')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea name="bio" class="form-control" id="" cols="10" rows="5">{{$detailProfile->bio}}</textarea>
  </div>
    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="address" class="form-control" id="" cols="10" rows="5">{{$detailProfile->address}}</textarea>
  </div>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection