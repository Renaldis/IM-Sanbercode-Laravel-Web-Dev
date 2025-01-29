@extends('layout.master')

@section('judul', 'Home - Review Film')

@section('content')

<!-- Hero Section -->
<div class="jumbotron text-center text-white d-flex align-items-center justify-content-center" 
    style="background: url('/images/hero-bg.jpg') no-repeat center center/cover; height: 500px;">
    <div class="container">
        <h1 class="display-4 fw-bold font-weight-bold shadow-lg">Selamat Datang di Review Film</h1>
        <p class="lead font-weight-bold shadow-lg">Temukan dan ulas film favoritmu di sini!</p>
        <a href="/film" class="btn btn-primary btn-lg">Lihat Film</a>
    </div>
</div>

<!-- CTA Section -->
@guest
<div class="container text-center my-5">
    <h3 class="fw-bold">Bergabung dengan Komunitas Kami</h3>
    <p class="mb-4">Daftar sekarang untuk memberikan ulasan dan rekomendasi film terbaik!</p>
    <a href="/register" class="btn btn-success btn-lg">Daftar Sekarang</a>
</div>
@endguest

@endsection
